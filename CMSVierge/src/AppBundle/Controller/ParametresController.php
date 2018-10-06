<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use AppBundle\Form\PageType;
use AppBundle\Form\MessageType;
use AppBundle\Entity\Message;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ParametresController extends Controller
{
    /**
     * @Route("/parametres", name="parametres")
     */
    public function changeAction(Request $request)
    {
        
		$em = $this->getDoctrine()->getManager();
		$site = $em->getRepository('AppBundle:Site')->find(1);
		if(is_null($site->getMessage()))
			$site->setMessage(new Message());

        $form1 = $this->get('form.factory')->createNamedBuilder("form1", FormType::class, $site)   
          ->add('pages', CollectionType::class, array(
            'entry_type'   => PageType::class,
            'label'        => false,
          ))     
          ->add('mailContact', EmailType::class)
          ->add('mailDevis', EmailType::class)     
          ->add('message', MessageType::class, array(
            'label'        => false,
          ))
          ->add('fichierHelp', TextType::class, array(
              'attr' => array(
                  'readonly' => true,
              ),
              'label' => 'url'
          ))               
          ->add('Enregistrer', SubmitType::class)
          ->getForm()
        ;

        if ($request->isMethod('POST')) {     
            $form1->handleRequest($request); 
            if ($request->request->has('form1')) {                      
                if ($form1->isValid()) {
                    $em->persist($site);
                    $em->persist($site->getMessage());
                    $em->flush(); 
                    return $this->redirectToRoute('parametres');
                }
            }                   
        }

        return $this->render('default/parametres.html.twig', 
            array(
                'form1' => $form1->createView(),
                'site' => $site,
            ))
        ;  
    }
}
