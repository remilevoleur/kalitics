<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use AppBundle\Entity\ChampActualiteContent;
use AppBundle\Entity\SousPage;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\CallbackTransformer;

class ChampActualiteContentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')            
            ->add('texte', TextareaType::class);

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
        ))
            ->add('image', ChampImageType::class, array(
                    'label' => "Image ( proportion recommandée 3:2 )",
                )
            )
        ;

        $builder
            ->add('date', DateTimeType::class, array(                    
                    'label' => "Date de publication",
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
            'data_class' => 'AppBundle\Entity\ChampActualiteContent'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_champactualitecontent';
    }


}
