<?php

namespace Pasi\OrdenadorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OrdenadorBundle:Default:index.html.twig', array('name' => $name));
    }

}
