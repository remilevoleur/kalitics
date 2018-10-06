<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ChampImageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lien', TextType::class, array(
                    'label' => "Lien éventuel (vers une page ou un fichier)",
                    'required' => false
                ))
            ->add('image', TextType::class, array(
                'attr' => array(
                    'readonly' => true,
                ),
                'label' => 'url'
            ))
            ->add('position', IntegerType::class, array(
                    'label' => "* Position du champ dans le bloc"
                ))
        ;

        $builder
            ->add('date', DateTimeType::class, array(
                    'label' => "Date de publication"
                )
            )
        ;

        $builder
            ->add('datecachee', DateTimeType::class, array(                    
                    'label' => false,
                    'widget' => 'single_text',
                    'required' => false,
                    'attr'=>array('style'=>'display:none;'),
                )
            )
        ;

        $builder->get('date')->addModelTransformer(new CallbackTransformer(
            function ($value) {
                if(!$value) {
                    return new \DateTime();
                }
                return $value;
            },
            function ($value) {
                return $value;
            }
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ChampImage'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_champimage';
    }


}
