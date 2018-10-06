<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerAware;

class BuilderError implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $em = $this->container->get('doctrine')->getManager();
        $pages = $em->getRepository('AppBundle:Page')->findBy(array(), array('position' => 'ASC'));
        $ancres = $em->getRepository('AppBundle:SousPage')->findBy(array('page' => null));

        foreach ($pages as $page) {  
            $sousPages = $em->getRepository('AppBundle:SousPage')->findBy(array('page' => $page->getId()), array('position' => 'ASC')); 
            $premiere = reset($sousPages);
            $libelle = $premiere->getLibelle();            

            if(is_null($premiere->getLien())){
                $menu->addChild($premiere->getLibelle(), array(
                    'route' => $premiere->getRoute(), 'routeParameters' => array('id' => $premiere->getId())
                ));
            }else{
                $menu->addChild($premiere->getLibelle(), array(
                    'uri' => $premiere->getLien()
                ));
            }           
                array_shift($sousPages);
                if(count($sousPages) >= 1){
                    $menu[$libelle]->setAttribute('dropdown', true);
                    foreach ($sousPages as $sousPage) {           
                        if(is_null($sousPage->getLien())){
                            $menu[$libelle]->addChild($sousPage->getLibelle(), array(
                                'route' => $sousPage->getRoute(), 'routeParameters' => array('id' => $sousPage->getId())
                            ));
                        }else{
                            $menu[$libelle]->addChild($sousPage->getLibelle(), array(
                                'uri' => $sousPage->getLien()
                            ));
                        }
                    }
                }
        }

        return $menu;
    }

    public function userMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right');

            $username = "visiteur";

            $menu->addChild('User', array('label' => 'Bonjour ' . $username))
                ->setAttribute('class', 'fa fa-user')
                ->setAttribute('dropdown', true);      

            $menu['User']->addChild('Se connecter', array('route' => 'fos_user_security_login'))
                ->setAttribute('class', 'fa fa-sign-in');

        return $menu;
    }
}