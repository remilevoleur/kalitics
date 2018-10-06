<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BibliothequeParamsController extends Controller
{
    /**
     * @Route("/bibliotheque/{id}", name="bibliotheque")
     */
    public function afficherAction(Request $request, $id)
    {           
        $em = $this->getDoctrine()->getManager();        

        $Bibliotheque = $em->getRepository('BUBundle:Bibliotheque')->find($id);
        $Services = $em->getRepository('BUBundle:Service')->findAll();
        $ListBibliotheques = $em->getRepository('BUBundle:Bibliotheque')->findAll();
    
        $form1 = $this->get('form.factory')->createNamedBuilder("form1", FormType::class, $Bibliotheque)   
          ->add('nomPrincipal',     TextType::class, array('label' => 'Nom principal'))
          ->add('nomSecondaire',    TextType::class, array('label' => 'Nom secondaire'))
          ->add('telephone',        TextType::class, array('label' => 'Numéro de contact'))
          ->add('email',            TextType::class, array('label' => 'Email'))
          ->add('siteWeb',          TextType::class, array('label' => 'Site web'))
          ->add('Modifier',         SubmitType::class)
          ->getForm()
        ;

        $form2 = $this->get('form.factory')->createNamedBuilder("form2", FormType::class, $Bibliotheque)   
          ->add('acces',            TextType::class, array('label' => "Conditions d'accés"))
          ->add('emprunt',          CheckboxType::class, array('label' => "Possibilité d'emprunt de livres", 'required' => false))
          ->add('places',           TextType::class, array('label' => 'Nombre de places assises'))
          ->add('urlCatalogue',     TextType::class, array('label' => 'Accés au catalogue'))
          ->add('nbJrsReservation', IntegerType::class, array('label' => "Nombre de jours réservables à l'avance"))
          ->add('Modifier',         SubmitType::class)
          ->getForm()
        ;

        $form3 = $this->get('form.factory')->createNamedBuilder("form3", FormType::class, $Bibliotheque)
        ->add('service', EntityType::class, array(
            'class' => 'BUBundle:Service',
            'choice_label'     => 'nom',
            'multiple'     => true,
            'expanded'     => true
        ))
        ->add('Modifier',         SubmitType::class)
        ->getForm();

        $form4 = $this->get('form.factory')->createNamedBuilder("form4", FormType::class, $Bibliotheque)   
          ->add('adresse',     TextType::class)          
          ->add('Modifier',         SubmitType::class)
          ->getForm()
        ;

        if ($request->isMethod('POST')) {     
            $form1->handleRequest($request); 
            $form2->handleRequest($request);   
            $form3->handleRequest($request);  
            $form4->handleRequest($request);                             
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
                    $em->flush();
                }
            }else if ($request->request->has('form3')) {                       
                if ($form3->isValid()) {
                    $em = $this->getDoctrine()->getManager();        
                    $em->persist($Bibliotheque);
                    $em->flush();
                }
            }else if ($request->request->has('form4')) {
                if ($form4->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($Bibliotheque);
                    $em->flush();
                }
            }
            return $this->redirectToRoute('bibliotheque', array('id' => $id));
        }

        return $this->render('default/bibliothequeParams.html.twig',
        array(
            'form1' => $form1->createView(),
            'form2' => $form2->createView(),
            'form3' => $form3->createView(),
            'form4' => $form4->createView(),
            'bibliotheque'  => $Bibliotheque,
            'listBibliotheques' => $ListBibliotheques
        ))
        ;        
    }    
}
