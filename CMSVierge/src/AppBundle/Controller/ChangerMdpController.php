<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ChangerMdpController extends Controller
{

    /**
     * @Route("/fichiers/changer_mdp/{mdp}", name="changer_mdp")
     */
    public function indexAction(Request $request, $mdp)
    {
        $em = $this->getDoctrine()->getManager();

        $compteDossiers = $em->getRepository('AppBundle:CompteDossiers')->find(1);

        $compteDossiers->setMdp(md5($mdp));

        $em->persist($compteDossiers);
        $em->flush(); 

        return $this->redirectToRoute('fichiers', array('id' => 1));
    }
}
