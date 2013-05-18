<?php

namespace Pasi\PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function index2Action()
    {
        return $this->render('PanelBundle:Default:index.html.twig');
    }
   
}