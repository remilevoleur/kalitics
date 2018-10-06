<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UploadFichierHelpSiteController extends Controller
{
    /**
     * @Route("/fichierhelpsiteuploadhandler", name="fichierhelpsiteuploadhandler")
     */
    public function uploadAction(Request $request)
    {
        $output = array('uploaded' => false);
	    $file = $request->files->get('file');
	    $fileName = $file->getClientOriginalName();
	 
	    $uploadDir = $this->get('kernel')->getRootDir() . '/../web/';
	    if (!file_exists($uploadDir) && !is_dir($uploadDir)) {
	        mkdir($uploadDir, 0775, true);
	    }
	    if ($file->move($uploadDir, $fileName)) { 
			$output['uploaded'] = true;
	       	$output['fileName'] = $fileName;
	    }
	    return new JsonResponse($output);
    }
}
