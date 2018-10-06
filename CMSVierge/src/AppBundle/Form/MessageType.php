<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\SousPage;
use Doctrine\ORM\EntityRepository;

class MessageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder            
            ->add('bandeauMessage')                    
            ->add('messageCouleur', ColorType::class) 
        ;

        $builder->add('ancre', EntityType::class, array(
            'class' => SousPage::class,
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('a')
                    ->where('a.page is NULL')
                    ->orderBy('a.libelle', 'ASC');
            },
            'choice_label' => 'libelle',
            'placeholder' => 'Liste des ancres',
            'required' => false,
        ));

        $builder
            ->add('datePublication', DateTimeType::class, array(
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

        $builder->get('datePublication')->addModelTransformer(new CallbackTransformer(
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

        $builder
            ->add('dateFinPublication')
        ;

        $builder
            ->add('datecacheefin', DateTimeType::class, array(                    
                    'label' => false,
                    'widget' => 'single_text',
                    'required' => false,
                    'attr'=>array('style'=>'display:none;'),
                )
            )
        ;

        $builder->get('dateFinPublication')->addModelTransformer(new CallbackTransformer(
            function ($value) {
                if(!$value) {
                    return (new \DateTime())->modify('+1 day');
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
            'data_class' => 'AppBundle\Entity\Message'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_message';
    }


}
