<?php

namespace remiii\AWSDownloadCheckBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function videoAction($videoNumber)
    {
        return $this->render('remiiiAWSDownloadCheckBundle:Default:video.html.twig', array('videoNumber' => $videoNumber));
    }
}
