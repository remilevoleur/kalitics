<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07/08/2018
 * Time: 16:15
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Specialite;

class SpecialiteController extends Controller
{
    /**
     * @Rest\Get("/specialites", name="app_specialite_list")
     */
    public function listAction()
    {
        $specialites = $this->getDoctrine()->getRepository('AppBundle:Specialite')->findAll();

        $data = $this->get('jms_serializer')->serialize($specialites, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Rest\Get(
     *     path = "/specialites/{id}",
     *     name = "app_specialite_show",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function showAction(Specialite $specialite)
    {
        return $specialite;
    }
}