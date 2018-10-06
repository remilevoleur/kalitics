<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DeletePhotoController extends Controller
{
    /**
     * @Route("/deletephoto/{id}", name="deletephoto")
     */
    public function deleteAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();				

		$page = $em->getRepository('AppBundle:SousPage')->find($id);
		$page->setBackground("");
		$em->persist($page);

		$em->flush();

        return $this->redirectToRoute('homepage', array('id' => $id));
    }
}
