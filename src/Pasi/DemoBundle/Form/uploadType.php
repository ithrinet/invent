<?php

namespace Pasi\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\Common\Collections\Collection;

class uploadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fotos', 'collection', array(
            		'type'      => 'file',
            		'allow_add' => true,
            		'allow_delete' => true,
            		'prototype' => true,
            		'options'=>array(
            		'required'  => false,
            		'attr'  => array('class' => 'unidades')
        )));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pasi\DemoBundle\Entity\upload'
        ));
    }

    public function getName()
    {
        return 'pasi_demobundle_uploadtype';
    }
}
