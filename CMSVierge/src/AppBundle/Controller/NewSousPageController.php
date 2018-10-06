<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Form\ChampTexteType;
use AppBundle\Form\ChampImageType;
use AppBundle\Entity\SousPage;
use AppBundle\Entity\SousPageLien;

class NewSousPageController extends Controller
{

    /**
     * @Route("/admin/newsouspage/{id}", name="new_sous_page")
     */
    public function indexAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('AppBundle:Page')->findOneBy(array('id' => $id));

        $sousPage = new SousPage();
        $sousPage->setRoute('homepage');
        $sousPage->setPage($page);

        $form1 = $this->get('form.factory')->createNamedBuilder("form1", FormType::class, $sousPage)   
          ->add("libelle")
          ->add("position")
          ->add("lien", TextType::class, array(
                    'label' => 'Lien éventuel vers un fichier ou un site',
                    'required' => false
                )
          )
          ->add('images', CollectionType::class, array(
                  'entry_type'   => ChampImageType::class,
                  'allow_add'    => true,
                  'label'       => false,
                  'entry_options' => array('label' => false),
                  'allow_delete' => true,
                  'by_reference' => false,
              )
          )
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

        return $this->render('default/newSousPage.html.twig', 
            array(
                'form1' => $form1->createView(),
            ))
        ;  
    }
}
