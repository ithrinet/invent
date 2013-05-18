<?php

namespace Pasi\PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PanelController extends Controller
{
    public function indexAction()
    {
        return $this->render('PanelBundle:Panel:index.html.twig');
    }
}