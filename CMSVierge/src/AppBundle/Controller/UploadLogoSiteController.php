<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UploadLogoSiteController extends Controller
{
    /**
     * @Route("/logositeuploadhandler", name="logositeuploadhandler")
     */
    public function uploadAction(Request $request)
    {
        
        $output = array('uploaded' => false);
	    // get the file from the request object
	    $file = $request->files->get('file');
	    // generate a new filename (safer, better approach)
	    // To use original filename, $fileName = $this->file->getClientOriginalName();
	    $fileName = $file->getClientOriginalName();
	 
	    // set your uploads directory
	    $uploadDir = $this->get('kernel')->getRootDir() . '/../web/';
	    
	    if ($file->move($uploadDir, "logoSiteTPC.png")) { 			
			$output['uploaded'] = true;
	       	$output['fileName'] = $fileName;
	    }
	    return new JsonResponse($output);
    }
}
