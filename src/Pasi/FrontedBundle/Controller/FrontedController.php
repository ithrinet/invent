<?php

namespace Pasi\FrontedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pasi\EmpleadoBundle\Entity\Empleado;
use Pasi\OrdenadorBundle\Entity\Ordenador;
use Pasi\ImpresoraBundle\Entity\Impresora;
use  Pasi\MovilBundle\Entity\Movil;

class FrontedController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$empleados = $em->getRepository('EmpleadoBundle:Empleado')->findAll();
    	$ordenadores = $em->getRepository('OrdenadorBundle:Ordenador')->findAll();
    	$impresoras = $em->getRepository('ImpresoraBundle:Impresora')->findAll();
    	$moviles = $em->getRepository('MovilBundle:Movil')->findAll();
        
        return $this->render('FrontedBundle:Fronted:index.html.twig',array(
        		'empleados'=>$empleados,
        		'ordenadores'=>$ordenadores,
        		'impresoras'=>$impresoras,
        		'moviles'=>$moviles,
        ));
        
    }
    
    public function empleadoAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$empleado = $em->getRepository('EmpleadoBundle:Empleado')->find($id);
    	$movil = $empleado->getMoviles();
    	$ordenador = $empleado->getOrdenadores();
    	$impresora = $empleado->getImpresoras();
    	
    	if(!$empleado){
    		throw new NotFoundHttpException("Post no encontrado");
    	}
    	return $this->render('FrontedBundle:Fronted:detail_user.html.twig',array(
    			'empleado'=>$empleado,
    			'movil'=>$movil,
    			'ordenador'=>$ordenador,
    			'impresora'=>$impresora,
    	));
    	
    }
    public function ordenadorAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$ordenador = $em->getRepository('OrdenadorBundle:Ordenador')->find($id);
    
    	if (!$ordenador) {
    		throw $this->createNotFoundException('Post no encontrado');
    	}
    
    	return $this->render('FrontedBundle:Fronted:detail_pc.html.twig', array(
    			'ordenador'=> $ordenador,
    			 
    	));
    }
    public function impresoraAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$impresora = $em->getRepository('ImpresoraBundle:Impresora')->find($id);
    
    	if (!$impresora) {
    		throw $this->createNotFoundException('Post no encontrado');
    	}
    
    	return $this->render('FrontedBundle:Fronted:detail_print.html.twig', array(
    			'impresora'=>$impresora,
    			 
    	));
    }
    public function movilAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$Movil = $em->getRepository('MovilBundle:Movil')->find($id);
    
    	if (!$Movil) {
    		throw $this->createNotFoundException('Post no encontrado');
    	}
        
    	return $this->render('FrontedBundle:Fronted:detail_movil.html.twig', array(
    			'movil'=> $Movil,
    			
    	        ));
    }
    public function buscarAction(){
    	$cadena = $this->getRequest()->query->get('buscar');
    	$em = $this->getDoctrine()->getEntityManager();
    	
    	$qb = $em->getRepository('EmpleadoBundle:Empleado')->createQueryBuilder('e');
    	$empleado= $qb->where($qb->expr()->like('e.nombre', ':busqueda'))
    				->orderBy('e.nombre','DESC')
    				->setParameter('busqueda', '%'.$cadena.'%')
    				->getQuery()
    				->getResult();
    	
   /* $qb = $em->getRepository('PasiBibliotecaBundle:Album')->createQueryBuilder('a');
    	$albums = $qb->where($qb->expr()->like('a.titulo', ':busqueda'))
			    	->orderBy('a.fechaModificacion','DESC')
			    	->setParameter('busqueda', '%'.$cadena.'%')
			    	->getQuery()
			    	->getResult();
    	$qb = $em->getRepository('PasiBibliotecaBundle:Cancion')->createQueryBuilder('a');
    	$canciones = $qb->where($qb->expr()->like('a.titulo', ':busqueda'))
    	->orderBy('a.fechaModificacion','DESC')
    	->setParameter('busqueda', '%'.$cadena.'%')
    	->getQuery()
    	->getResult();*/
    	
    	return $this->render('FrontedBundle:Fronted:busqueda.html.twig',
    			array('empleado'=>$empleado,
    				//	'albums'=>$albums,
    					//'canciones'=>$canciones
    	));
    }
}
