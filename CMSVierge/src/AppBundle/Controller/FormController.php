<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class FormController extends Controller
{
    /**
     * @Route("/form", name="formhandler")
     */
    public function uploadAction(Request $request, \Swift_Mailer $mailer)
    {               
        $em = $this->getDoctrine()->getManager();
		$site = $em->getRepository('AppBundle:Site')->find(1);

        if ($request->isXMLHttpRequest()){        	

        	$nom = $request->request->get("nom");
        	$prenom = $request->request->get("prenom");
        	$tel = $request->request->get("tel");
        	$mail = $request->request->get("mail");
        	$question = $request->request->get("question");
        	$devis = $request->request->get("devis");        	
        	$creneau0 = $request->request->get("creneau0");
        	$creneau1 = $request->request->get("creneau1");    
        	$type = $request->request->get("type");          	  

        	$creneaux = array();
        	$i = 0;
        	$index = "creneau".$i;
        	while (!is_null($request->request->get($index))) {
        		$creneaux[$index] = $request->request->get($index);
        		$i = $i + 1;
        		$index = "creneau".$i;
        	}

        	if($type == "dev"){
        		$message = (new \Swift_Message('Mail demande de devis'))
			        ->setFrom('jean-baptiste@technique-pc.fr')
			        ->setTo($site->getMailDevis())
			        ->setBody(
		        		$this->renderView(
			                'emails/devis.html.twig',
			                array(
			                	'nom' => $nom,
			                	'prenom' => $prenom,
			                	'tel' => $tel,
			                	'mail' => $mail,
			                	'devis' => $devis,
			                	'creneaux' => $creneaux,
		                	)
			            ),
			            'text/html'
			        )
			    ;
			    $messageAutoReply = (new \Swift_Message('[TPC] Vous avez demandé un devis'))			    
			    	->setFrom('jean-baptiste@technique-pc.fr')
			        ->setTo($mail)		        
		        	->setBody(
		        		$this->renderView(
			                'emails/devis_auto_reply.html.twig',
			                array(
			                	'prenom' => $prenom,
			                	'devis' => $devis,
			                	'logoTPC' => "http://".$_SERVER['SERVER_ADDR']."/techniquepc/web/logoSiteTPC.png",
		                	)
			            ),
			            'text/html'
			        )
			    ;

        	}else{
        		$message = (new \Swift_Message('Mail prise de contact'))
			        ->setFrom('jean-baptiste@technique-pc.fr')
			        ->setTo($site->getMailContact())
			        ->setBody(
		        		$this->renderView(
			                'emails/question.html.twig',
			                array(
			                	'nom' => $nom,
			                	'prenom' => $prenom,
			                	'tel' => $tel,
			                	'mail' => $mail,
			                	'question' => $question,			                	
		                	)
			            ),
			            'text/html'
			        )
			    ;

			    $messageAutoReply = (new \Swift_Message('[TPC] Vous nous avez posé une question'))			    
			    	->setFrom('jean-baptiste@technique-pc.fr')
			        ->setTo($mail)		        
		        	->setBody(
		        		$this->renderView(
			                'emails/question_auto_reply.html.twig',
			                array(
			                	'prenom' => $prenom,
			                	'question' => $question,
			                	'logoTPC' => "http://".$_SERVER['SERVER_ADDR']."/techniquepc/web/logoSiteTPC.png",
		                	)
			            ),
			            'text/html'
			        )
			    ;
        	}        	       
        	$mailer->send($messageAutoReply);
		    $response = $mailer->send($message);

		    if($response == 1)
		    	$arrData = ['output' => "Message envoyé, nous prendrons contact avec vous dans les plus brefs délais"];
		    else
		    	$arrData = ['output' => "Le message n'a malheureusement pas pu être envoyé, nous allons tenter de résoudre le problème mais vous pouvez toujours nous contacter à contact@technique-pc.fr ou nous appeler"];
        	return new JsonResponse($arrData);
    	}
	    return new JsonResponse($arrData);
    }
}
