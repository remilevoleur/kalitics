<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use BUBundle\Entity\Message;
use BUBundle\Form\MessageType;

class MessageController extends Controller
{
    /**
     * @Route("/message/{id}", name="message")
     */
    public function afficherAction(Request $request, $id)
    {           
        $em = $this->getDoctrine()->getManager(); 

        $Bibliotheque = $em->getRepository('BUBundle:Bibliotheque')->find($id);  
        $ListBibliotheques = $em->getRepository('BUBundle:Bibliotheque')->findAll(); 

        $Message = new Message();
        $Message->setBibliotheque($Bibliotheque);

        $form1 = $this->get('form.factory')->createNamedBuilder("form1", FormType::class, $Message)   
          ->add('dateDebut', DateTimeType::class)
          ->add('dateFin', DateTimeType::class)
          ->add('message', TextareaType::class)
          ->add('Publier',         SubmitType::class)
          ->getForm()
        ; 

        $form2 = $this->get('form.factory')->createNamedBuilder("form2", FormType::class, $Bibliotheque)   
          ->add('messages', CollectionType::class, array(
            'entry_type'   => MessageType::class,
            'entry_options' => array('label' => false),
            'label'        => false,   
            'allow_delete' => true,         
          ))
          ->add('Modifier',         SubmitType::class)
          ->getForm()
        ;        

        if ($request->isMethod('POST')) {     
            $form1->handleRequest($request); 
            $form2->handleRequest($request); 
            if ($request->request->has('form1')) {                      
                if ($form1->isValid()) {
                    $em = $this->getDoctrine()->getManager();        
                    $em->persist($Message);
                    $em->flush();                    
                }
            } else if ($request->request->has('form2')) {                      
                if ($form2->isValid()) {
                    $em = $this->getDoctrine()->getManager();  
                    if($Bibliotheque->getMessages() != null) {     
                      foreach($Bibliotheque->getMessages() as $Message) {
                        $em->persist($Message);
                      }
                    }
                    $em->flush();                    
                }
            }      
            return $this->redirectToRoute('message', array('id' => $id));
        }

        return $this->render('default/message.html.twig',
        array(
            'form1' => $form1->createView(), 
            'form2' => $form2->createView(),          
            'bibliotheque'  => $Bibliotheque,
            'listBibliotheques' => $ListBibliotheques
        ))
        ;        
    }    
}
