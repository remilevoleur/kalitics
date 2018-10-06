<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DeletePhotoController extends Controller
{
    /**
     * @Route("/deletephoto/{idBibliotheque}/{idPhoto}", name="deletephoto")
     */
    public function deleteAction(Request $request, $idBibliotheque, $idPhoto)
    {
    	$em = $this->getDoctrine()->getManager();				

    	$Photo = $em->getRepository('BUBundle:Photo')->find($idPhoto);

		$Bibliotheque = $em->getRepository('BUBundle:Bibliotheque')->find($idBibliotheque);
		$Bibliotheque->removePhoto($Photo);
		$em->persist($Bibliotheque);

		$em->flush();

        return $this->redirectToRoute('bibliotheque', array('id' => $idBibliotheque));
    }
}
