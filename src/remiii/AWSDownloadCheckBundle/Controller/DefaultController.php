<?php

namespace remiii\AWSDownloadCheckBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Template
     */
    public function videoAction($videoNumber)
    {
        return array('videoNumber' => $videoNumber);
    }

    public function finalAction()
    {
        return $this->render('remiiiAWSDownloadCheckBundle:Default:final.html.twig');
    }
}
