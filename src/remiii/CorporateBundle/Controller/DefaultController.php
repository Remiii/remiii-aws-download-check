<?php

namespace remiii\CorporateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('remiiiCorporateBundle:Default:index.html.twig', array('name' => $name));
    }
}
