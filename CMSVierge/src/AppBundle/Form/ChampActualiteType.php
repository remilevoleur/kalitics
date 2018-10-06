<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ChampActualiteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('champsActualiteContent', CollectionType::class, array(
                    'entry_type'   => ChampActualiteContentType::class,
                    'allow_add'    => true,
                    'label'        => false,
                    'allow_delete' => true,
                    'by_reference' => false,
                )
            )
            ->add('position', IntegerType::class, array(
                    'label' => "* Position du champ dans le bloc"
                ))
            ->add('limite', IntegerType::class, array(
                    'label' => "* Nombre d'actualités visibles"
                ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ChampActualite'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_champactualite';
    }


}
