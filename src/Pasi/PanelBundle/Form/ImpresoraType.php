<?php

namespace Pasi\PanelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImpresoraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',null, array(
            		'required'=> false
        ))
            ->add('marca')
            ->add('modelo')
            ->add('tipo', 'choice', array(
            		'choices' => array('laser' => 'Laser', 'tinta' => 'Tinta')
        ))
            ->add('empleado')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pasi\ImpresoraBundle\Entity\Impresora'
        ));
    }

    public function getName()
    {
        return 'pasi_impresorabundle_impresoratype';
    }
}
