<?php

namespace remiii\GlobalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('remiiiGlobalBundle:Default:index.html.twig', array('name' => $name));
    }
}
