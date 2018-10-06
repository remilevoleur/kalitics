<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Entity\Dossier;

class SupprimerDossierController extends Controller
{

    /**
     * @Route("/fichiers/supprimer_dossier/{id}", name="supprimer_dossier")
     */
    public function indexAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $dossier = $em->getRepository('AppBundle:Dossier')->find($id);

        $idDossierParent = $dossier->getRacine()->getId();

        $em->remove($dossier); 
        $em->flush();

        return $this->redirectToRoute('fichiers', array('id' => $idDossierParent));
    }
}
