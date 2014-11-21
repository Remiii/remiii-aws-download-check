<?php

namespace remiii\AWSDownloadCheckBundle\Controller;

use remiii\AWSDownloadCheckBundle\Entity\Tester;
use remiii\AWSDownloadCheckBundle\Entity\VideoTest;
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
        $em = $this->getDoctrine()->getManager();
        $tempTesterId = $request->query->get('tempTesterId');
        $tempTester = $em->getRepository('remiiiAWSDownloadCheckBundle:Tester')->findOneByTempId($tempTesterId);

        if (!$tempTester instanceof Tester) {
            if (1 == $videoNumber) {
                $tempTester = new Tester();
                $tempId = sha1($request->getClientIp() . '-' . date('now'));
                $tempTester->setTempId($tempId);
            } else {
                // TODO: probably an error
                throw $this->createNotFoundException('you are lost.');
            }
        }
        $videoTest = new VideoTest();
        $videoTest->setTester($tempTester);
        $videoTest->setIdVideo($videoNumber);
        $form = $this->createForm(new VideoTestType(), $videoTest);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($videoTest);
            $em->flush();

            return $this->redirect($this->generateUrl('remiii_aws_download_check_video', array('videoNumber' => $videoNumber+1, 'tempTesterId' => $tempTester->getTempId())));
        }

        return array('videoNumber' => $videoNumber, 'form' => $form->createView());
    }

    /**
    * @Template
    */
    public function finalAction()
    {
        return array();
    }

    /**
    * @Template
    */
    public function adminAction()
    {
        return array();
    }

}
