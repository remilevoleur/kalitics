<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07/08/2018
 * Time: 10:49
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Metier;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class MetierController extends Controller
{
    /**
     * @Rest\Get("/metiers", name="app_metier_list")
     */
    public function listAction()
    {
        $metiers = $this->getDoctrine()->getRepository('AppBundle:Metier')->findAll();

        $data = $this->get('jms_serializer')->serialize($metiers, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Rest\Get(
     *     path = "/metiers/{id}",
     *     name = "app_metier_show",
     *     requirements = {"id"="\d+"}
     * )
     * @Rest\View
     */
    public function showAction(Metier $metier)
    {
        return $metier;
    }
}