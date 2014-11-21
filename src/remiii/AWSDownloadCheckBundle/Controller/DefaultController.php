<?php

namespace remiii\AWSDownloadCheckBundle\Controller;

use remiii\AWSDownloadCheckBundle\Entity\Tester;
use remiii\AWSDownloadCheckBundle\Entity\VideoTest;
use remiii\AWSDownloadCheckBundle\Form\TesterType;
use remiii\AWSDownloadCheckBundle\Form\VideoTestType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Template
     * @param Request $request
     * @param $videoNumber
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function videoAction(Request $request, $videoNumber)
    {
        $videos = $this->container->getParameter('video');
        if (count($videos) < $videoNumber) {
            throw $this->createNotFoundException('you are lost.');
        }
        $currentVideo = array_slice($videos, $videoNumber-1, 1);

        $em = $this->getDoctrine()->getManager();
        $tempTesterId = $request->query->get('tempTesterId');
        $tempTester = $em->getRepository('remiiiAWSDownloadCheckBundle:Tester')->findOneByTempId($tempTesterId);

        if (!$tempTester instanceof Tester) {
            if (1 == $videoNumber) {
                $tempTester = new Tester();
                $date = new \DateTime('now');
                $tempId = sha1($request->getClientIp() . '-' . $date->getTimestamp() . '-' . uniqid(mt_rand(), true));
                $tempTester->setTempId($tempId);
            } else {
                // TODO: probably an error
                throw $this->createNotFoundException('you are lost.');
            }
        }
        $videoTest = new VideoTest();
        $videoTest->setTester($tempTester);
        $videoTest->setIdVideo($videoNumber);
        $videoTest->setTitleVideo(key($currentVideo));
        $videoTest->setUrlVideo($currentVideo[key($currentVideo)]);
        $form = $this->createForm(new VideoTestType(), $videoTest);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($videoTest);
            $em->flush();

            if (count($videos) >= $videoNumber+1) {
                return $this->redirect($this->generateUrl('remiii_aws_download_check_video', array('videoNumber' => $videoNumber+1, 'tempTesterId' => $tempTester->getTempId())));
            } else {
                return $this->redirect($this->generateUrl('remiii_aws_download_check_final', array('tempTesterId' => $tempTester->getTempId())));
            }
        }

        return array('videoNumber' => $videoNumber, 'form' => $form->createView(), 'videoTitle' => key($currentVideo), 'videoUrl' => $currentVideo[key($currentVideo)]);
    }

    /**
    * @Template
    */
    public function finalAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $tempTesterId = $request->query->get('tempTesterId');
        $tempTester = $em->getRepository('remiiiAWSDownloadCheckBundle:Tester')->findOneByTempId($tempTesterId);
        $form = $this->createForm(new TesterType(), $tempTester);

        $form->handleRequest($request);

        if ($request->isMethod('POST')) {
            if ($form->isValid()) {
                $tempTester->setIpAddress($request->getClientIp());
                $tempTester->setUserAgent($request->headers->get('User-Agent'));
                $em->persist($tempTester);
                $em->flush();

                return $this->redirect($this->generateUrl('remiii_aws_download_check_thanks'));
            }
        }

        return array('form' => $form->createView());
    }

    /**
     * @Template
     */
    public function thanksAction()
    {
        return array();
    }

    /**
    * @Template
    */
    public function adminAction()
    {

        $em = $this->getDoctrine()->getManager();
        $results = $em->getRepository('remiiiAWSDownloadCheckBundle:Tester')->findAll();
        return array('results'=>$results);
    }

}
