<?php

namespace Pasi\PanelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrdenadorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('ram')
            ->add('disco')
            ->add('cpu')
            ->add('descripcion')
            ->add('empleado')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pasi\OrdenadorBundle\Entity\Ordenador'
        ));
    }

    public function getName()
    {
        return 'pasi_ordenadorbundle_ordenadortype';
    }
}
