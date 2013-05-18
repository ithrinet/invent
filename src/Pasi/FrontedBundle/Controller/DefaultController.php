<?php

namespace Pasi\FrontedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FrontedBundle:Default:index.html.twig', array('name' => $name));
    }
}
