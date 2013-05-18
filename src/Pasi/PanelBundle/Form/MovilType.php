<?php

namespace Pasi\PanelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MovilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('modelo')
            ->add('numero')
            ->add('empleado')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pasi\MovilBundle\Entity\Movil'
        ));
    }

    public function getName()
    {
        return 'pasi_movilbundle_moviltype';
    }
}
