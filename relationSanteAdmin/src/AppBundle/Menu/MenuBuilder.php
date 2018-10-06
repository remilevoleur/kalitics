<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class MenuBuilder
{

    private $factory;

    private $container;

    /**
     * @param FactoryInterface $factory
     *
     * Add any other dependency you need
     */
    public function __construct(FactoryInterface $factory, ContainerInterface $container)
    {
        $this->factory = $factory;
        $this->container = $container;
    }

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $menu->addChild('Accueil', ['route' => 'homepage']);
        $menu->addChild('Accueil2', ['route' => 'homepage']);
        $menu->addChild('Accueil3', ['route' => 'homepage']);

        return $menu;
    }

    public function createUserMenu(array $options)
    {
        $menu = $this->factory->createItem('root');

        $menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right');

        if($this->container->get('security.authorization_checker')->isGranted(array('ROLE_USER'))) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

            $menu->addChild('User', array('label' => 'Bonjour ' . $user->getUsername()))
                ->setAttribute('class', 'fa fa-user')
                ->setAttribute('dropdown', true);

            $menu['User']->addChild('Se déconnecter', array('route' => 'fos_user_security_logout'))
                ->setAttribute('class', 'fa fa-sign-out');
        }else{
            $username = "visiteur";

            $menu->addChild('User', array('label' => 'Bonjour ' . $username))
                ->setAttribute('class', 'fa fa-user')
                ->setAttribute('dropdown', true);      

            $menu['User']->addChild('Se connecter', array('route' => 'fos_user_security_login'))
                ->setAttribute('class', 'fa fa-sign-in');
        }

        return $menu;
    }
}