<?php

namespace Pasi\EmpleadoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EmpleadoBundle:Default:index.html.twig', array('name' => $name));
    }
}
