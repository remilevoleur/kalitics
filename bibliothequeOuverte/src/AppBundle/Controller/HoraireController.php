<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use BUBundle\Entity\Horaire;
use BUBundle\Form\HoraireType;
use BUBundle\Entity\HoraireExceptionnel;
use BUBundle\Form\HoraireExceptionnelType;

class HoraireController extends Controller
{
    /**
     * @Route("/horaire/{id}", name="horaire")
     */
    public function afficherAction(Request $request, $id)
    {           
        $em = $this->getDoctrine()->getManager(); 

        $Bibliotheque = $em->getRepository('BUBundle:Bibliotheque')->find($id);   
        $ListBibliotheques = $em->getRepository('BUBundle:Bibliotheque')->findAll();

        $form1 = $this->get('form.factory')->createNamedBuilder("form1", FormType::class, $Bibliotheque)   
          ->add('horaires', CollectionType::class, array(
            'entry_type'   => HoraireType::class,
            'allow_add'    => true,
          ))
          ->add('Modifier',         SubmitType::class)
          ->getForm()
        ; 

        $form2 = $this->get('form.factory')->createNamedBuilder("form2", FormType::class, $Bibliotheque)   
          ->add('horairesExceptionnel', CollectionType::class, array(
            'entry_type'   => HoraireExceptionnelType::class,
            'entry_options' => array('label' => false),
            'label'        => false,
            'allow_add'    => true,  
            'allow_delete' => true,
            'by_reference' => false,          
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
                    $em->persist($Bibliotheque);
                    $em->flush();                    
                }
            }else if ($request->request->has('form2')) {                      
                if ($form2->isValid()) {
                    $em = $this->getDoctrine()->getManager();        
                    $em->persist($Bibliotheque);
                    foreach($Bibliotheque->getHorairesExceptionnel() as $HoraireExceptionnel) {
                      $em->persist($HoraireExceptionnel);
                    }
                    $em->flush();                    
                }
            }            
            return $this->redirectToRoute('horaire', array('id' => $id));
        }

        return $this->render('default/horaires.html.twig',
        array(
            'form1' => $form1->createView(),          
            'form2' => $form2->createView(),            
            'bibliotheque'  => $Bibliotheque,
            'listBibliotheques' => $ListBibliotheques
        ))
        ;        
    }    
}
