<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BUBundle\Entity\Photo;
use Symfony\Component\HttpFoundation\JsonResponse;

class UploadController extends Controller
{
    /**
     * @Route("/fileuploadhandler/{id}", name="fileuploadhandler")
     */
    public function uploadAction(Request $request, $id)
    {
        
        $output = array('uploaded' => false);
	    // get the file from the request object
	    $file = $request->files->get('file');
	    // generate a new filename (safer, better approach)
	    // To use original filename, $fileName = $this->file->getClientOriginalName();
	    $fileName = $file->getClientOriginalName();
	 
	    // set your uploads directory
	    $uploadDir = $this->get('kernel')->getRootDir() . '/../web/uploads/';
	    if (!file_exists($uploadDir) && !is_dir($uploadDir)) {
	        mkdir($uploadDir, 0775, true);
	    }
	    if ($file->move($uploadDir, $fileName)) { 
			// get entity manager
			$em = $this->getDoctrine()->getManager();

			// create and set this mediaEntity
			$mediaEntity = new PHOTO();
			$Bibliotheque = $em->getRepository('BUBundle:Bibliotheque')->find($id);

			$mediaEntity->setNom($fileName);
			$mediaEntity->setBibliotheque($Bibliotheque);
			$em->persist($mediaEntity);
			
			$Bibliotheque->addPhoto($mediaEntity);
			$em->persist($Bibliotheque);

			$em->flush();
			$output['uploaded'] = true;
	       	$output['fileName'] = $fileName;
	    }
	    return new JsonResponse($output);
    }
}
