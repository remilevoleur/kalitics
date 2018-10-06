<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ChampEmbarqueType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position', IntegerType::class, array(
                    'label' => "* Position du champ dans le bloc"
                ))
            ->add('hauteur', IntegerType::class, array(
                    'label' => "Hauteur en pixels",
                    'required' => false
                ))
            ->add('largeur', IntegerType::class, array(
                    'label' => "Largeur en %",
                    'required' => false
                ))
            ->add('lien')
        ;

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ChampEmbarque'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_champembarque';
    }


}