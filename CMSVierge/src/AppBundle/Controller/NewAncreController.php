<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Form\ChampTexteType;
use AppBundle\Entity\SousPage;

class NewAncreController extends Controller
{

    /**
     * @Route("/admin/newancre/{nbAncres}", name="new_ancre")
     */
    public function indexAction(Request $request, $nbAncres)
    {
        $em = $this->getDoctrine()->getManager();
        $sousPage = new SousPage();
        $sousPage->setRoute('homepage');
        $sousPage->setPosition($nbAncres + 1);

        $form1 = $this->get('form.factory')->createNamedBuilder("form1", FormType::class, $sousPage)   
          ->add("libelle")
          ->add('Creer', SubmitType::class)
          ->getForm()
        ;

        if ($request->isMethod('POST')) {     
            $form1->handleRequest($request); 
            if ($request->request->has('form1')) {                      
                if ($form1->isValid()) {
                    $em->persist($sousPage);
                    $em->flush(); 
                    return $this->redirectToRoute('homepage', array('id' => $sousPage->getId()));
                }
            }                   
        }

        return $this->render('default/newAncre.html.twig', 
            array(
                'form1' => $form1->createView(),
            ))
        ;  
    }
}
