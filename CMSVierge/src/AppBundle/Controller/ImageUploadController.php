<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ImageUploadController extends Controller
{
    /**
     * @Route("/imageuploadhandler/{dir}", name="imageuploadhandler")
     */
    public function uploadAction(Request $request, $dir)
    {
        
        $output = array('uploaded' => false);
	    // get the file from the request object
	    $file = $request->files->get('file');
	    // generate a new filename (safer, better approach)
	    // To use original filename, $fileName = $this->file->getClientOriginalName();
	    $fileName = $file->getClientOriginalName();
	 
	    // set your uploads directory
	    $uploadDir = $this->get('kernel')->getRootDir() . '/../web/uploads/' . $dir;
	    if (!file_exists($uploadDir) && !is_dir($uploadDir)) {
	        mkdir($uploadDir, 0775, true);
	    }
	    if ($file->move($uploadDir, $fileName)) { 
			// get entity manager
			$output['uploaded'] = true;
	       	$output['fileName'] = $fileName;
	       	$output['dir'] = $dir;
	    }
	    return new JsonResponse($output);
    }
}
