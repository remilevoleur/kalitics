<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UploadLogoHelpController extends Controller
{
    /**
     * @Route("/logohelpsiteuploadhandler", name="logohelpsiteuploadhandler")
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
	    
	    if ($file->move($uploadDir, "help.png")) { 			
			$output['uploaded'] = true;
	       	$output['fileName'] = $fileName;
	    }
	    return new JsonResponse($output);
    }
}
