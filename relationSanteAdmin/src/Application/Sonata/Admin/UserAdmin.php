<?php

namespace Application\Sonata\Admin;

use Sonata\UserBundle\Admin\Model\UserAdmin as SonataUserAdmin;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends SonataUserAdmin
{
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper): void
    {
        parent::configureFormFields($formMapper);

        $formMapper
            ->tab('Important')
                ->with('Coordonnées')
                    ->add('longitude')
                    ->add('latitude')
                ->end()
            ->end()
        ;
    }
}