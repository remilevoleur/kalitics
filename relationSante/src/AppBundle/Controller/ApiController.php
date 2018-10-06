<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ApiController extends FOSRestController
{
    /**
     * @Rest\Get("/api", name="app_test_index")
     */
    public function indexAction()
    {
        if (false === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException();
        }
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $data = array("hello" => "world");
        $view = $this->view($data);
        return $this->handleView($view);
    }
}