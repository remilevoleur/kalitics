<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SupprimerPageController extends Controller
{
    /**
     * @Route("/supprimerpage/{id}", name="supprimer_page")
     */
    public function suppAction(Request $request, $id)
    {
        
		$em = $this->getDoctrine()->getManager();

		$sousPage = $em->getRepository('AppBundle:SousPage')->find($id);

		$page = $sousPage->getPage();		

		if(!is_null($page)){
			if(count($page->getSousPages()) <= 1){
				$em->remove($sousPage);	
				$em->flush();
				$em->remove($page);
			}
			else
				$em->remove($sousPage);
		}else
			$em->remove($sousPage);		

		$em->flush();

		$redirection = $em->getRepository('AppBundle:SousPage')->find(1);

		return $this->redirectToRoute('homepage', array('id' => $redirection->getId()));
    }
}
