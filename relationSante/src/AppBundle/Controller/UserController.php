<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Application\Sonata\UserBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @Rest\Get("/users", name="app_user_list")
     */
    public function listAction()
    {
        $users = $this->getDoctrine()->getRepository('ApplicationSonataUserBundle:User')->findAll();

        $data = $this->get('jms_serializer')->serialize($users, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Rest\Get(
     *     path = "/users/{id}",
     *     name = "app_user_show",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function showAction(User $user)
    {
        return $user;
    }

    /**
     * @Rest\Get("/users/{id}/candidatures")
     * @Rest\View
     */
    public function listCandidaturesAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository("ApplicationSonataUserBundle:User")->find($id);

        return $user->getCandidatures();
    }

    /**
     * @Rest\Get(
     *     path = "/users/{id}/demandes",
     *     name = "app_user_demandes",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function demandesAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        $disponibilitesHebdomadaires = $user->getDisponibilitesHebdomadaires();

        $qb->select('e.libelle as etablissement, d.libelle, d.jour,
                ( 6371 * acos( cos( radians('. $user->getLatitude() .') )
              * cos( radians( e.latitude ) )
              * cos( radians( e.longitude ) - radians('. $user->getLongitude() .') )
              + sin( radians('. $user->getLatitude() .') )
              * sin( radians( e.latitude ) ) ) ) AS distance
            ')
            ->from('AppBundle:Demande', 'd')
            ->leftJoin('d.etablissement', 'e')
            ->leftJoin('d.creneaux', 'c')
        ;

        $j = 0;
        foreach ($disponibilitesHebdomadaires as $disponibilitesHebdomadaire) {
            if ($disponibilitesHebdomadaire->getDisponible() == true){
                $where = '( (DAYOFWEEK(d.jour) - 1) = '. $disponibilitesHebdomadaire->getJour()->format("N") . ' AND 
                    ( 6371 * acos( cos( radians('. $user->getLatitude() .') )
                      * cos( radians( e.latitude ) )
                      * cos( radians( e.longitude ) - radians('. $user->getLongitude() .') )
                      + sin( radians('. $user->getLatitude() .') )
                      * sin( radians( e.latitude ) ) ) )
                 < '. $disponibilitesHebdomadaire->getRayon();

                $missions = $disponibilitesHebdomadaire->getMissions();
                $i = 0;
                foreach ($missions as $mission) {
                    if($i == 0)
                        $where .= ' AND ( ( d.mission = ' . $mission->getId() . ' ) ';
                    else
                        $where .= ' OR ( d.mission = ' . $mission->getId() . ' ) ' ;
                    $i ++;
                }
                $where .= ' )) ';

                $creneaux = $disponibilitesHebdomadaire->getCreneaux();
                if(!$creneaux->isEmpty()) {
                    $where .= ' AND (';
                    $i = 0;
                    foreach ($creneaux as $creneau) {
                        if ($i == 0)
                            $where .= ' ( c.heureDebut > '. $creneau->getHeureDebut();
                        else
                            $where .= ' OR ( c.heureDebut > '. $creneau->getHeureDebut();
                        $where .= ' AND c.heureFin < '. $creneau->getHeureFin() .' ) ';

                        $where .= ' OR (( c.heureDebut >= '. $creneau->getHeureDebut() .' AND c.minuteDebut >= ' . $creneau->getMinuteDebut() . ' ) ';
                        $where .= ' AND ( c.heureFin <= '. $creneau->getHeureFin() .' AND c.minuteFin <= ' . $creneau->getMinuteFin()  . ' )) ';

                        $i++;
                    }
                    $where .= ')';
                }
                $qb->orWhere($where);
            }else{
                $qb->andWhere('(DAYOFWEEK(d.jour) - 1) <> '. $disponibilitesHebdomadaire->getJour()->format("N"));
            }
        }
        $qb->andWhere('d.specialite = ' . $user->getSpecialite()->getId());

        $qb->orderBy('distance', 'ASC');
        $qb->addOrderBy('d.jour', 'ASC');

        $query = $qb->getQuery();
        $result = $query->getResult();

        return $result;
    }
}