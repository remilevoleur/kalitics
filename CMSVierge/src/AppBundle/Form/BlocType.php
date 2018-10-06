<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;  

class BlocType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('champsTexte', CollectionType::class, array(
                        'entry_type'   => ChampTexteType::class,
                        'allow_add'    => true,
                        'entry_options' => array('label' => false),
                        'allow_delete' => true,
                        'by_reference' => false,
                    )
                )
                ->add('champsMap', CollectionType::class, array(
                        'entry_type'   => ChampMapType::class,
                        'allow_add'    => true,
                        'entry_options' => array('label' => false),
                        'allow_delete' => true,
                        'by_reference' => false,
                    )
                )
                ->add('champsActualite', CollectionType::class, array(
                        'entry_type'   => ChampActualiteType::class,
                        'allow_add'    => true,
                        'entry_options' => array('label' => false),
                        'allow_delete' => true,
                        'by_reference' => false,
                    )
                )
                ->add('champsImage', CollectionType::class, array(
                        'entry_type'   => ChampImageType::class,
                        'allow_add'    => true,
                        'entry_options' => array('label' => false),
                        'allow_delete' => true,
                        'by_reference' => false,
                    )
                )
                ->add('champsSlide', CollectionType::class, array(
                        'entry_type'   => ChampSlideType::class,
                        'allow_add'    => true,
                        'entry_options' => array('label' => false),
                        'allow_delete' => true,
                        'by_reference' => false,
                    )
                )
                ->add('champsTitre', CollectionType::class, array(
                        'entry_type'   => ChampTitreType::class,
                        'allow_add'    => true,
                        'entry_options' => array('label' => false),
                        'allow_delete' => true,
                        'by_reference' => false,
                    )
                )

                ->add('champsFormulaire', CollectionType::class, array(
                        'entry_type'   => ChampFormulaireType::class,
                        'allow_add'    => true,
                        'entry_options' => array('label' => false),
                        'allow_delete' => true,
                        'by_reference' => false,
                    )
                )

                ->add('champsEncart', CollectionType::class, array(
                        'entry_type'   => ChampEncartType::class,
                        'allow_add'    => true,
                        'entry_options' => array('label' => false),
                        'allow_delete' => true,
                        'by_reference' => false,
                    )
                )

                ->add('champsEmbarque', CollectionType::class, array(
                        'entry_type'   => ChampEmbarqueType::class,
                        'allow_add'    => true,
                        'entry_options' => array('label' => false),
                        'allow_delete' => true,
                        'by_reference' => false,
                    )
                )
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Bloc'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_bloc';
    }


}
