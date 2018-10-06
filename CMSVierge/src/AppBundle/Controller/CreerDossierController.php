<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Entity\Dossier;

class CreerDossierController extends Controller
{

    /**
     * @Route("/fichiers/creer_fichier/{dossierCourant}/{nom}", name="creer_dossier")
     */
    public function indexAction(Request $request, $dossierCourant, $nom)
    {
        $em = $this->getDoctrine()->getManager();

        $racine = $em->getRepository('AppBundle:Dossier')->find($dossierCourant);

        $nouveauDossier = new Dossier();
        $nouveauDossier->setNom($nom);
        $nouveauDossier->setRacine($racine);

        $em->persist($nouveauDossier);
        $em->flush(); 

        return $this->redirectToRoute('fichiers', array('id' => $nouveauDossier->getId()));
    }
}
