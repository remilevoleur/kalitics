<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ChangePagePosition extends Controller
{
    /**
     * @Route("/changerpositionpage/{idPage}/{position}", name="changerpositionpage")
     */
    public function changeAction(Request $request, $idPage, $position)
    {
        
		// get entity manager
		$em = $this->getDoctrine()->getManager();

		// create and set this mediaEntity
		$page = $em->getRepository('AppBundle:Page')->find($idPage);
		$page->setPosition($position);

		$em->persist($page);

		$em->flush();

		return $this->redirectToRoute('homepage', array('id' => $idPage));
    }
}
