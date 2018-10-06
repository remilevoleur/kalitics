<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08/08/2018
 * Time: 11:33
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Disponibilite;
use AppBundle\Entity\Creneau;
use Symfony\Component\HttpFoundation\Request;

class DisponibiliteController  extends Controller
{
    /**
     * @Rest\Get("/disponibilites", name="app_disponibilite_list")
     */
    public function listAction()
    {
        $disponibilites = $this->getDoctrine()->getRepository('AppBundle:Disponibilite')->findAll();

        $data = $this->get('jms_serializer')->serialize($disponibilites, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Rest\Get(
     *     path = "/disponibilites/{id}",
     *     name = "app_disponibilite_show",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function showAction(Disponibilite $disponibilite)
    {
        return $disponibilite;
    }

    /**
     * @Rest\Post("/disponibilites")
     * @Rest\View
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $this->get('jms_serializer')->deserialize($request->getContent(), 'array', 'json');

        $disponibilite = new Disponibilite();

        $adresse = $data["disponibilite"]["adresse"];
        $longitude = "";
        $latitude = "";
        $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($adresse).'&sensor=false');
        $geo = json_decode($geo, true);
        if (isset($geo['status']) && ($geo['status'] == 'OK')) {
            $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
            $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
        }

        $disponibilite->setLongitude((string)$longitude);
        $disponibilite->setLatitude((string)$latitude);
        $disponibilite->setDisponible($data["disponibilite"]["disponible"]);
        $disponibilite->setRayon($data["disponibilite"]["rayon"]);
        $disponibilite->setType($data["disponibilite"]["type"]);
        $disponibilite->setJour(new \DateTime($data["disponibilite"]["jour"]));

        foreach ($data["disponibilite"]["creneaux"] as $creneau) {
            $tmpCreneau = new Creneau();
            $tmpCreneau->setHeureDebut($creneau["heureDebut"]);
            $tmpCreneau->setHeureFin($creneau["heureFin"]);
            $tmpCreneau->setMinuteDebut($creneau["minuteDebut"]);
            $tmpCreneau->setMinuteFin($creneau["minuteFin"]);

            $disponibilite->addCreneaux($tmpCreneau);
        }

        foreach ($data["disponibilite"]["missions"] as $mission) {
            $tmpMission = $em->getRepository("AppBundle:Mission")->find($mission["id"]);

            $disponibilite->addMission($tmpMission);
        }

        $personnel = $em->getRepository("ApplicationSonataUserBundle:User")->find($data["personnel"]["id"]);
        $personnel->addDisponibilite($disponibilite);

        $em->persist($disponibilite);
        $em->flush();

        return $disponibilite;
    }

    /**
     * @Rest\Delete("/disponibilites/{id}")
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     */
    public function removeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $this->get('jms_serializer')->deserialize($request->getContent(), 'array', 'json');

        $disponibilite = $em->getRepository("AppBundle:Disponibilite")->find($data["id"]);

        $missions = $disponibilite->getMissions();

        foreach ($missions as $mission) {
            $disponibilite->removeMission($mission);
        }

        $em->remove($disponibilite);
        $em->flush();
    }
}