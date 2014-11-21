<?php

namespace remiii\AWSDownloadCheckBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * VideoTest
 *
 * @ORM\Table(name="video_test")
 * @ORM\Entity(repositoryClass="remiii\AWSDownloadCheckBundle\Repository\VideoTestRepository")
 */
class VideoTest
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * @ORM\Column(name="id_video", type="integer")
     */
    private $idVideo;

    /**
     * @var string
     * @ORM\Column(name="title_video", type="string", length=255)
     * @Assert\Length(max = 255)
     */
    private $titleVideo;

    /**
     * @var string
     * @ORM\Column(name="url_video", type="string", length=255)
     * @Assert\Length(max = 255)
     */
    private $urlVideo;

    /**
     * @var string
     * @ORM\Column(name="download_time", type="string", length=255)
     * @Assert\Length(max = 255)
     */
    private $downloadTime;

    /**
     * @var string
     * @ORM\Column(name="reading_quality", type="string", length=255)
     * @Assert\Length(max = 255)
     */
    private $readingQuality;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     * @Assert\DateTime()
     */
    private $created;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="modified", type="datetime")
     * @Assert\DateTime()
     */
    private $modified;

    /**
     * @ORM\ManyToOne(targetEntity="Tester", inversedBy="videoTests", cascade={"persist"})
     */
    private $tester;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idVideo
     *
     * @param integer $idVideo
     * @return VideoTest
     */
    public function setIdVideo($idVideo)
    {
        $this->idVideo = $idVideo;

        return $this;
    }

    /**
     * Get idVideo
     *
     * @return integer
     */
    public function getIdVideo()
    {
        return $this->idVideo;
    }

    /**
     * Set titleVideo
     *
     * @param string $titleVideo
     * @return VideoTest
     */
    public function setTitleVideo($titleVideo)
    {
        $this->titleVideo = $titleVideo;

        return $this;
    }

    /**
     * Get titleVideo
     *
     * @return string
     */
    public function getTitleVideo()
    {
        return $this->titleVideo;
    }

    /**
     * Set urlVideo
     *
     * @param string $urlVideo
     * @return VideoTest
     */
    public function setUrlVideo($urlVideo)
    {
        $this->urlVideo = $urlVideo;

        return $this;
    }

    /**
     * Get urlVideo
     *
     * @return string
     */
    public function getUrlVideo()
    {
        return $this->urlVideo;
    }

    /**
     * Set downloadTime
     *
     * @param string $downloadTime
     * @return VideoTest
     */
    public function setDownloadTime($downloadTime)
    {
        $this->downloadTime = $downloadTime;

        return $this;
    }

    /**
     * Get downloadTime
     *
     * @return string
     */
    public function getDownloadTime()
    {
        return $this->downloadTime;
    }

    /**
     * Set readingQuality
     *
     * @param string $readingQuality
     * @return VideoTest
     */
    public function setReadingQuality($readingQuality)
    {
        $this->readingQuality = $readingQuality;

        return $this;
    }

    /**
     * Get readingQuality
     *
     * @return string
     */
    public function getReadingQuality()
    {
        return $this->readingQuality;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return VideoTest
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return VideoTest
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set tester
     *
     * @param \remiii\AWSDownloadCheckBundle\Entity\Tester $tester
     * @return VideoTest
     */
    public function setTester(\remiii\AWSDownloadCheckBundle\Entity\Tester $tester = null)
    {
        $this->tester = $tester;

        return $this;
    }

    /**
     * Get tester
     *
     * @return \remiii\AWSDownloadCheckBundle\Entity\Tester
     */
    public function getTester()
    {
        return $this->tester;
    }
}
