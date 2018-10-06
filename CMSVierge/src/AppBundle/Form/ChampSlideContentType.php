<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\CallbackTransformer;

class ChampSlideContentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', TextType::class, array(
                'attr' => array(
                    'readonly' => true,
                )
            ))
            ->add('texte')
            ->add('texteCouleur', ColorType::class)
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
            'data_class' => 'AppBundle\Entity\ChampSlideContent'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_champslidecontent';
    }


}
