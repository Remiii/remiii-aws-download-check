<?php

namespace remiii\CorporateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function homeAction()
    {
        return $this->render('remiiiCorporateBundle:Default:home.html.twig');
    }
}
