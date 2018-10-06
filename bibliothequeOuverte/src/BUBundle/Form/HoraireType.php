<?php

namespace BUBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class HoraireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('heureOuverture', TimeType::class,        array('attr' => array('style' => 'margin: 5px;')))
            ->add('heureFermeture', TimeType::class,        array('attr' => array('style' => 'margin: 5px;')))
            ->add('ouvert',         CheckboxType::class,    array('attr' => array('class' => 'bootstrap-switch'), 'required' => false))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BUBundle\Entity\Horaire'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bubundle_horaire';
    }


}
