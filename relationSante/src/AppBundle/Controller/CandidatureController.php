<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Candidature;

class CandidatureController extends Controller
{
    /**
     * @Rest\Get("/candidatures", name="app_candidature_list")
     */
    public function listAction()
    {
        $candidatures = $this->getDoctrine()->getRepository('AppBundle:Demande')->findAll();

        $data = $this->get('jms_serializer')->serialize($candidatures, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Rest\Post("/candidatures")
     * @Rest\View
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $this->get('jms_serializer')->deserialize($request->getContent(), 'array', 'json');

        $user = $em->getRepository("ApplicationSonataUserBundle:User")->find($data["user"]["id"]);
        $demande = $em->getRepository("AppBundle:Demande")->find($data["demande"]["id"]);
        $candidature = new Candidature();

        $candidature->setDemande($demande);
        $candidature->setStatut($data["candidature"]["statut"]);
        $candidature->setDate(new \DateTime("now"));

        $user->addCandidature($candidature);
        $demande->addCandidature($candidature);

        $em->persist($candidature);
        $em->flush();

        return $candidature;
    }

    /**
     * @Rest\Put("/candidatures/{id}")
     * @Rest\View
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $this->get('jms_serializer')->deserialize($request->getContent(), 'array', 'json');

        $candidature = $em->getRepository("AppBundle:Candidature")->find($id);

        $candidature->setStatut($data["candidature"]["statut"]);

        $em->persist($candidature);
        $em->flush();

        return $candidature;
    }

    /**
     * @Rest\Delete("/candidatures/{id}")
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     */
    public function removeAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $this->get('jms_serializer')->deserialize($request->getContent(), 'array', 'json');

        $candidature = $em->getRepository("AppBundle:Candidature")->find($id);
        $personnel = $em->getRepository("ApplicationSonataUserBundle:User")->find($data["user"]["id"]);

        $personnel->removeCandidature($candidature);
        $em->persist($personnel);

        $em->remove($candidature);

        $em->flush();
    }
}