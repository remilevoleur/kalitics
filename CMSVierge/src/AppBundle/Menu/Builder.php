<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder implements ContainerAwareInterface
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
            if($this->container->get('security.authorization_checker')->isGranted(array('ROLE_ADMIN'))) {
                if(count($sousPages) > 1)
                    array_shift($sousPages);
                $menu[$libelle]->setAttribute('dropdown', true);
                foreach ($sousPages as $sousPage) { 
                    if(is_null($sousPage->getLien())){
                        $menu[$libelle]->addChild($sousPage->getLibelle(), array(
                            'route' => $sousPage->getRoute(), 'routeParameters' => array('id' => $sousPage->getId()),
                                        'extras' => array(
                                            'images' => $sousPage->getImages(),
                                        ),
                        ));
                    }else{
                        $menu[$libelle]->addChild($sousPage->getLibelle(), array(
                            'uri' => $sousPage->getLien()
                        ));
                    }
                }
                $menu[$libelle]->addChild("+", array(
                    'route' => 'new_sous_page', 'routeParameters' => array('id' => $page->getId())
                ));
            }else{
                array_shift($sousPages);
                if(count($sousPages) >= 1){
                    $menu[$libelle]->setAttribute('dropdown', true);
                    foreach ($sousPages as $sousPage) {
                        if(is_null($sousPage->getLien())){
                            $menu[$libelle]->addChild($sousPage->getLibelle(), array(
                                'route' => $sousPage->getRoute(), 'routeParameters' => array('id' => $sousPage->getId()),
                                            'extras' => array(
                                                'images' => $sousPage->getImages(),
                                            ),
                            ));
                        }else{
                            $menu[$libelle]->addChild($sousPage->getLibelle(), array(
                                'uri' => $sousPage->getLien()
                            ));
                        }
                    }
                }
            }
        }

        if($this->container->get('security.authorization_checker')->isGranted(array('ROLE_ADMIN'))) {
            $menu->addChild("Ancres", array());
            $menu['Ancres']->setAttribute('dropdown', true);
            foreach ($ancres as $ancre) {  
                $menu['Ancres']->addChild($ancre->getLibelle(), array(
                    'route' => $ancre->getRoute(), 'routeParameters' => array('id' => $ancre->getId())
                ));
            }
            $menu['Ancres']->addChild("+", array(
                'route' => 'new_ancre', 'routeParameters' => array('nbAncres' => count($ancres))
            ));
        }     

        if($this->container->get('security.authorization_checker')->isGranted(array('ROLE_ADMIN'))) {
            $menu->addChild("Fichiers", array(
                'route' => 'fichiers', 'routeParameters' => array('id' => 1)
            ));
            $menu->addChild("Paramètres", array(
                'route' => 'parametres'
            ));
            $menu->addChild("+", array(
                'route' => 'new_page'
            ));
        }

        return $menu;
    }    
}