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
use BUBundle\Form\SalleType;
use BUBundle\Entity\Salle;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class SalleController extends Controller
{
    /**
     * @Route("/salle/{id}", name="salle")
     */
    public function afficherAction(Request $request, $id)
    {           
        $em = $this->getDoctrine()->getManager();        

        $Bibliotheque = $em->getRepository('BUBundle:Bibliotheque')->find($id);
        $ListBibliotheques = $em->getRepository('BUBundle:Bibliotheque')->findAll();
    
        $form1 = $this->get('form.factory')->createNamedBuilder("form1", FormType::class, $Bibliotheque)   
          ->add('salles', CollectionType::class, array(
            'entry_type'   => SalleType::class,
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
            if ($request->request->has('form1')) {                      
                if ($form1->isValid()) {
                    $em = $this->getDoctrine()->getManager();        
                    $em->persist($Bibliotheque);
                    foreach($Bibliotheque->getSalles() as $Salle) {
                      $em->persist($Salle);
                    }
                    $em->flush();                    
                }
            }
        }

        return $this->render('default/salle.html.twig',
        array(
            'form1' => $form1->createView(),
            'bibliotheque'  => $Bibliotheque,
            'listBibliotheques' => $ListBibliotheques
        ))
        ;        
    }    
}
