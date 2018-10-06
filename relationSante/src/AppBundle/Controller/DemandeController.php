<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07/08/2018
 * Time: 14:06
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Creneau;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Demande;

class DemandeController extends Controller
{
    /**
     * @Rest\Get("/demandes", name="app_demande_list")
     */
    public function listAction()
    {
        $demandes = $this->getDoctrine()->getRepository('AppBundle:Demande')->findAll();

        $data = $this->get('jms_serializer')->serialize($demandes, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Rest\Get(
     *     path = "/demandes/{id}",
     *     name = "app_demande_show",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function showAction(Demande $demande)
    {
        return $demande;
    }

    /**
     * @Rest\Post("/demandes")
     * @Rest\View
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $this->get('jms_serializer')->deserialize($request->getContent(), 'array', 'json');

        $demande = new Demande();
        $demande->setLibelle($data["libelle"]);
        $demande->setSalaire($data["salaire"]);
        $demande->setStatut($data["statut"]);
        $demande->setJour(new \DateTime($data["jour"]));

        foreach ($data["creneaux"] as $creneau) {
            $tmpCreneau = new Creneau();
            $tmpCreneau->setHeureDebut($creneau["heureDebut"]);
            $tmpCreneau->setHeureFin($creneau["heureFin"]);
            $tmpCreneau->setMinuteDebut($creneau["minuteDebut"]);
            $tmpCreneau->setMinuteFin($creneau["minuteFin"]);

            $demande->addCreneaux($tmpCreneau);
        }

        $specialite = $em->getRepository("AppBundle:Specialite")->find($data["specialite"]["id"]);
        $demande->setSpecialite($specialite);

        $mission = $em->getRepository("AppBundle:Mission")->find($data["mission"]["id"]);
        $demande->setMission($mission);

        $demande->setDate(new \DateTime("now"));

        $em->persist($demande);
        $em->flush();

        return $demande;
    }

    /**
     * @Rest\Delete("/demandes/{id}")
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     */
    public function removeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $this->get('jms_serializer')->deserialize($request->getContent(), 'array', 'json');

        $demande = $em->getRepository("AppBundle:Demande")->find($data["id"]);

        $em->remove($demande);
        $em->flush();
    }
}