<?php

namespace remiii\AWSDownloadCheckBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('remiiiAWSDownloadCheckBundle:Default:index.html.twig', array('name' => $name));
    }
}
