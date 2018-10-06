<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Fichier;

class FichierUploadController extends Controller
{
    /**
     * @Route("/fichier_upload/{dossier}", name="fichier_upload")
     */
    public function uploadAction(Request $request, $dossier)
    {
        
        $output = array('uploaded' => false);
	    $file = $request->files->get('file');
	    $fileName = $file->getClientOriginalName();
	 
	    $uploadDir = $this->get('kernel')->getRootDir() . '/../web/fichiers/';
	    if (!file_exists($uploadDir) && !is_dir($uploadDir)) {
	        mkdir($uploadDir, 0775, true);
	    }

	    if ($file->move($uploadDir, $fileName)) { 

			$em = $this->getDoctrine()->getManager();

			$dossierParent = $em->getRepository('AppBundle:Dossier')->find($dossier);
			$fichier = new Fichier();
			$fichier->setDossier($dossierParent);
			$fichier->setNom($fileName);

			$em->persist($fichier);

			$em->flush();
			$output['uploaded'] = true;
			$output['filename'] = $fileName;
	    }
	    return new JsonResponse($output);
    }
}
