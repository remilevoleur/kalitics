<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use BUBundle\Entity\Bibliotheque;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use BUBundle\Form\HoraireType;

class NouvelleBibliothequeController extends Controller
{
    /**
     * @Route("/new", name="new")
     */
    public function afficherAction(Request $request)
    {           
        $em = $this->getDoctrine()->getManager();        

        $Bibliotheque = new Bibliotheque();
        $ListBibliotheques = $em->getRepository('BUBundle:Bibliotheque')->findAll();
    
        $form1 = $this->get('form.factory')->createNamedBuilder("form1", FormType::class, $Bibliotheque)
          ->add('nomPrincipal',     TextType::class, array('label' => 'Nom principal'))
          ->add('nomSecondaire',    TextType::class, array('label' => 'Nom secondaire'))
          ->add('telephone',        TextType::class, array('label' => 'Numéro de contact'))
          ->add('email',            TextType::class, array('label' => 'Email'))
          ->add('siteWeb',          TextType::class, array('label' => 'Site web'))
          ->add('acces',            TextType::class, array('label' => "Conditions d'accés"))
          ->add('emprunt',          CheckboxType::class, array('label' => "Possibilité d'emprunt de livres", 'required' => false))
          ->add('places',           TextType::class, array('label' => 'Nombre de places assises'))
          ->add('urlCatalogue',     TextType::class, array('label' => 'Accés au catalogue'))
          ->add('nbJrsReservation', IntegerType::class, array('label' => "Nombre de jours réservables à l'avance"))
          ->add('service', EntityType::class, array(
            'class' => 'BUBundle:Service',
            'choice_label'     => 'nom',
            'multiple'     => true,
            'expanded'     => true
          ))
          ->add('adresse',     TextType::class, array('attr' => array('class' => 'controls', 'onkeypress' => 'return event.keyCode!=13')))  
          ->add('horaires', CollectionType::class, array(
            'entry_type'   => HoraireType::class,
            'allow_add'    => true,  
            'allow_delete' => true,
            'by_reference' => false,  
          ))                  
          ->add('Creer',         SubmitType::class)
          ->getForm()
        ;

        if ($request->isMethod('POST')) {     
            $form1->handleRequest($request); 
            if ($request->request->has('form1')) {                      
                if ($form1->isValid()) {
                    $em = $this->getDoctrine()->getManager();        
                    $em->persist($Bibliotheque);
                    $em->flush();                    
                }
            }
            return $this->redirectToRoute('bibliotheque', array('id' => $Bibliotheque->getId()));
        }

        return $this->render('default/NouvelleBibliotheque.html.twig',
        array(
            'form1' => $form1->createView(),
            'listBibliotheques' => $ListBibliotheques
        ))
        ;        
    }    
}
