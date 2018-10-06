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
use AppBundle\Entity\Page;
use AppBundle\Entity\SousPage;

class NewPageController extends Controller
{

    /**
     * @Route("/admin/newpage", name="new_page")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $page = new Page();
        $site = $em->getRepository('AppBundle:Site')->find(1);
        $page->setSite($site);
        $sousPage = new SousPage();
        $sousPage->setRoute('homepage');
        $sousPage->setPage($page);

        $form1 = $this->get('form.factory')->createNamedBuilder("form1", FormType::class, $sousPage)   
          ->add("libelle")
          ->add("position")
          ->add('Creer', SubmitType::class)
          ->getForm()
        ;

        if ($request->isMethod('POST')) {     
            $form1->handleRequest($request); 
            if ($request->request->has('form1')) {                      
                if ($form1->isValid()) {
                    $page->setPosition($sousPage->getPosition());                    
                    $sousPage->setPosition(1);
                    $em->persist($page);
                    $em->persist($sousPage);
                    $em->flush(); 
                    return $this->redirectToRoute('homepage', array('id' => $sousPage->getId()));
                }
            }                   
        }

        return $this->render('default/newPage.html.twig', 
            array(
                'form1' => $form1->createView(),
            ))
        ;  
    }
}
