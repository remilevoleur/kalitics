<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Entity\Fichier;

class SupprimerFichierController extends Controller
{

    /**
     * @Route("/fichiers/supprimer_fichier/{id}", name="supprimer_fichier")
     */
    public function indexAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $fichier = $em->getRepository('AppBundle:Fichier')->find($id);

        $idDossierParent = $fichier->getDossier()->getId();

        $em->remove($fichier); 
        $em->flush();

        return $this->redirectToRoute('fichiers', array('id' => $idDossierParent));
    }
}
