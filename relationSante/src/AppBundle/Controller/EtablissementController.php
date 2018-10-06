<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Etablissement;

class EtablissementController extends Controller
{
    /**
     * @Rest\Get("/etablissements", name="app_etablissement_list")
     */
    public function listAction()
    {
        $etablissements = $this->getDoctrine()->getRepository('AppBundle:Etablissement')->findAll();

        $data = $this->get('jms_serializer')->serialize($etablissements, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Rest\Get(
     *     path = "/etablissements/{id}",
     *     name = "app_etablissement_show",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function showAction(Etablissement $etablissement)
    {
        return $etablissement;
    }

    /**
     * @Rest\Post("/etablissements")
     * @Rest\View
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $this->get('jms_serializer')->deserialize($request->getContent(), 'array', 'json');

        $gerant = $em->getRepository("ApplicationSonataUserBundle:User")->find($data["gerant"]["id"]);
        $etablissement = new Etablissement();

        $adresse = $data["etablissement"]["adresse"];
        $longitude = "";
        $latitude = "";
        $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($adresse).'&sensor=false');
        $geo = json_decode($geo, true);
        if (isset($geo['status']) && ($geo['status'] == 'OK')) {
            $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
            $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
        }

        $etablissement->setLongitude($longitude);
        $etablissement->setLatitude($latitude);
        $etablissement->setTel($data["etablissement"]["tel"]);
        $etablissement->setMail($data["etablissement"]["mail"]);
        $etablissement->setFax($data["etablissement"]["fax"]);
        $etablissement->setLibelle($data["etablissement"]["libelle"]);

        $gerant->addEtablissement($etablissement);

        $em->persist($etablissement);
        $em->flush();

        return $etablissement;
    }
}