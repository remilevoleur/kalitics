<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ChampEncartType extends AbstractType
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
            ->add('champTexte', ChampTexteType::class, array(
                    
                )
            ) 
            ->add('champImage', ChampImageType::class, array(
                    
                )
            )
            ->add('couleur', ColorType::class, array(
                    'label' => "Couleur de fond"
                ))
            ->add('encartCouleur', ColorType::class, array(
                    'label' => "Couleur des bordures"
                )) 
        ;

        $builder->add('positionImage', ChoiceType::class, array(
            'choices'  => array(
                'Droite' => "droite",
                'Gauche' => "gauche",
            ),
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ChampEncart'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_champencart';
    }


}
