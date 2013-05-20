<?php

namespace Pasi\PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MakerLabs\PagerBundle\Pager;
use MakerLabs\PagerBundle\Adapter\ArrayAdapter;

use Pasi\EmpleadoBundle\Entity\Empleado;

class DefaultController extends Controller
{

   public function indexAction($page)
   {
      $em = $this->getDoctrine()->getEntityManager();
      
      $qb = $em->getRepository('Empleado')->createQueryBuilder('m');
      $adapter = new DoctrineOrmAdapter($qb);
      
      $pager = new Pager($adapter,
      		array('page' => $page, 'limit' => 15));
      
      return $this->render('index.html.twig',array('pager'=>$pager));
   }
}