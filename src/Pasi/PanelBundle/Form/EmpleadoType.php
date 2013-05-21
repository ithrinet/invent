<?php

namespace Pasi\PanelBundle\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Pasi\OrdenadorBundle\Entity\Ordenador;
use Pasi\ImpresoraBundle\Entity\Impresora;
use Pasi\MovilBundle\Entity\Movil;

class EmpleadoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text')
            ->add('apellidos','text')
            ->add('correo','email')
            ->add('direccion')
            ->add('fechaNacimiento', 'date')
            ->add('ordenadores',null,array(
            		'required'=> false,
        		))
            ->add('moviles',null,array(
            		'required'=> false,
        		))
            ->add('impresoras',null,array(
            		'required'=> false,
       			))
            
           /* ->add('ordenadores', null, array(
            		'empty_value' =>'Selecciona',
            		'required' => false,
            		'multiple' => false
        		))
        	->add('impresoras', 'collection', array(
        			'type' => new iTextType()
        		))
        			
        	->add('moviles', null, array(
        			'empty_value' =>'Selecciona',
        			'required' => false,
        			'multiple' => false
        		))
        	
            ->add('impresoras', 'entity',array(
            		'class' => 'ImpresoraBundle:Impresora',
            		'empty_value' =>'Selecciona una Impresora',
            		'property' => 'alias',
            		 'required' => false
        		))
            ->add('moviles', 'entity',array(
            		'class' => 'MovilBundle:Movil',
            		'empty_value' =>'Selecciona un Movil',
            		 'required' => false
        		))*/
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pasi\EmpleadoBundle\Entity\Empleado'
        ));
    }

    public function getName()
    {
        return 'pasi_panelobundle_empleadotype';
    }
}
