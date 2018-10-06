<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Form\ChampTexteType;
use AppBundle\Form\BlocType;

class DefaultController extends Controller
{
    public function indexAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('AppBundle:SousPage')->find($id);
        if(is_null($page))
            throw new NotFoundHttpException("Cette page n'existe pas");
        $site = $em->getRepository('AppBundle:Site')->find(1);
        $pageActualite = $em->getRepository('AppBundle:SousPage')->findOneBy(
            array('libelle' => 'Actualités')
        );
        $pageAccueilBg = $em->getRepository('AppBundle:SousPage')->findOneBy(
            array('libelle' => 'Accueil')
        );
        if(!is_null($pageAccueilBg))
            $pageAccueilBg = $pageAccueilBg->getBackground();
        if(!is_null($pageActualite))
            $pageActualite = $pageActualite->getId();
        $actualites = $em->getRepository('AppBundle:ChampActualiteContent')->findBy(array(), array('date' => 'ASC'), 5, null);        

        $form1 = $this->get('form.factory')->createNamedBuilder("form1", FormType::class, $page)   
          ->add('blocsCentre', CollectionType::class, array(
            'entry_type'   => BlocType::class,
            'allow_add'    => true,
            'label'        => false,
            'allow_delete' => true,
            'by_reference' => false,
          ))          
          ->add('Enregistrer', SubmitType::class)
          ->getForm()
        ;

        $form2 = $this->get('form.factory')->createNamedBuilder("form2", FormType::class, $page)   
          ->add('blocsGauche', CollectionType::class, array(
            'entry_type'   => BlocType::class,
            'allow_add'    => true,
            'label'        => false,
            'allow_delete' => true,
            'by_reference' => false,
          ))    
          ->add('Enregistrer', SubmitType::class)
          ->getForm()
        ;

        $form3 = $this->get('form.factory')->createNamedBuilder("form3", FormType::class, $page)   
          ->add('blocsDroite', CollectionType::class, array(
            'entry_type'   => BlocType::class,
            'allow_add'    => true,
            'label'        => false,
            'allow_delete' => true,
            'by_reference' => false,
          ))
          ->add('Enregistrer', SubmitType::class)
          ->getForm()
        ;   

        if ($request->isMethod('POST')) {     
            $form1->handleRequest($request); 
            $form2->handleRequest($request); 
            $form3->handleRequest($request); 
            if ($request->request->has('form1')) {                      
                if ($form1->isValid()) {
                    $em->persist($page);
                    $em->flush();                    
                }
            }else if ($request->request->has('form2')) {                      
                if ($form2->isValid()) {
                    $em->persist($page);
                    $em->flush();                    
                }
            }else if ($request->request->has('form3')) {                      
                if ($form3->isValid()) {
                    $em->persist($page);                    
                    $em->flush();                    
                }
            }       
            return $this->redirectToRoute('homepage', array('id' => $id));
        }

        return $this->render('default/index.html.twig', 
            array(
                'form1' => $form1->createView(),
                'form2' => $form2->createView(),
                'form3' => $form3->createView(),
                'page'  => $page,
                'pageActualite'  => $pageActualite,
                'bg' => $pageAccueilBg,
                'site' => $site,
            ))
        ;  
    }

    public function fichiersAction(Request $request, $id = 1)
    {
        $em = $this->getDoctrine()->getManager();

        $mdp = $em->getRepository('AppBundle:CompteDossiers')->find(1)->getMdp();

        if(!isset($_SERVER['PHP_AUTH_PW'])){
            header('WWW-Authenticate: Basic realm="Veuillez vous authentifier"');
            header('HTTP/1.0 401 Unauthorized');
            die ("Accés non autorisé, veuillez vous authentifier");
        }

        if(md5($_SERVER['PHP_AUTH_PW']) != $mdp){
            header('WWW-Authenticate: Basic realm="Mot de passe incorrect, merci de reessayer"');
            header('HTTP/1.0 401 Unauthorized');
            die ("Accés non autorisé, veuillez vous authentifier");
        }

        $pageAccueilBg = $em->getRepository('AppBundle:SousPage')->findOneBy(
            array('libelle' => 'Accueil')
        );
        if(!is_null($pageAccueilBg))
            $pageAccueilBg = $pageAccueilBg->getBackground();        

        $dossierCourant = $em->getRepository('AppBundle:Dossier')->find($id);

        $dossierParent = $dossierCourant->getRacine();

        $dossiersFils = $dossierCourant->getBranches();

        $fichiers = $dossierCourant->getFichiers();

        return $this->render('default/arborescence.html.twig', 
            array(
                'dossierCourant' => $dossierCourant,
                'dossierParent' => $dossierParent,
                'dossiersFils' => $dossiersFils,
                'fichiers' => $fichiers,
                'bg' => $pageAccueilBg,                
            ))
        ;  
    }
}
