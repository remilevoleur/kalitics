<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ListBibliotheques = $em->getRepository('BUBundle:Bibliotheque')->findAll();

        if(empty($ListBibliotheques))
            return $this->redirectToRoute('new');
        return $this->redirectToRoute('bibliotheque', array('id' => $ListBibliotheques[0]->getId()));
    }
}
