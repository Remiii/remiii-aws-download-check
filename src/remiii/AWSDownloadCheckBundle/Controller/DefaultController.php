<?php

namespace remiii\AWSDownloadCheckBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function videoAction($videoNumber)
    {
        return $this->render('remiiiAWSDownloadCheckBundle:Default:video.html.twig', array('videoNumber' => $videoNumber));
    }

    public function finalAction()
    {
        return $this->render('remiiiAWSDownloadCheckBundle:Default:final.html.twig');
    }
}
