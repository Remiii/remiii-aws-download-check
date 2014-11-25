<?php

namespace remiii\AWSDownloadCheckBundle\Entity;


use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Tester
 *
 * @ORM\Table(name="tester")
 * @ORM\Entity(repositoryClass="remiii\AWSDownloadCheckBundle\Repository\TesterRepository")
 * @UniqueEntity("tempId")
 * @ORM\HasLifecycleCallbacks
 */
class Tester
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="temp_id", type="string", length=255)
     * @Assert\Length(max = 255)
     */
    private $tempId;

    /**
     * @var string
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     * @Assert\Length(max = 255)
     */
    private $firstname;

    /**
     * @var string
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     * @Assert\Length(max = 255)
     */
    private $lastname;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     * @Assert\Length(max = 255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(name="isp", type="string", length=255, nullable=true)
     * @Assert\Length(max = 255)
     */
    private $isp;

    /**
     * @var string
     * @ORM\Column(name="connexion_type", type="string", length=255, nullable=true)
     * @Assert\Length(max = 255)
     */
    private $connexionType;

    /**
     * @var string
     * @ORM\Column(name="router_link", type="string", length=255, nullable=true)
     * @Assert\Length(max = 255)
     */
    private $routerLink;

    /**
     * @var string
     * @ORM\Column(name="ip_address", type="string", length=255, nullable=true)
     * @Assert\Length(max = 255)
     * @Assert\Ip
     */
    private $ipAddress;

    /**
     * @var string
     * @ORM\Column(name="user_agent", type="string", length=255, nullable=true)
     * @Assert\Length(max = 255)
     */
    private $userAgent;

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
     * @ORM\Column(name="speedtest_screenshot_path", type="string", length=255, nullable=true)
     */
    public $speedtestScreenshotPath;

    /**
     * @Assert\File(maxSize="2048k", mimeTypesMessage = "Please upload a file smaller than 2Mo")
     */
    private $speedtestScreenshot;

    /**
     * @return mixed
     */
    public function getSpeedtestScreenshot()
    {
        return $this->speedtestScreenshot;
    }

    /**
     * @param mixed $speedtestScreenshot
     */
    public function setSpeedtestScreenshot($speedtestScreenshot)
    {
        $this->speedtestScreenshot = $speedtestScreenshot;
    }

    /**
     * @ORM\Column(name="cloudfront_screenshot_path", type="string", length=255, nullable=true)
     */
    public $cloudfrontScreenshotPath;

    /**
     * @Assert\File(maxSize="2048k", mimeTypesMessage = "Please upload a file smaller than 2Mo")
     */
    private $cloudfrontScreenshot;

    /**
     * @return mixed
     */
    public function getCloudfrontScreenshot()
    {
        return $this->cloudfrontScreenshot;
    }

    /**
     * @param mixed $cloudfrontScreenshot
     */
    public function setCloudfrontScreenshot($cloudfrontScreenshot)
    {
        $this->cloudfrontScreenshot = $cloudfrontScreenshot;
    }

    /**
     * @ORM\Column(name="expert_part_one_screenshot_path", type="string", length=255, nullable=true)
     */
    public $expertPartOneScreenshotPath;

    /**
     * @Assert\File(maxSize="2048k", mimeTypesMessage = "Please upload a file smaller than 2Mo")
     */
    private $expertPartOneScreenshot;

    /**
     * @return mixed
     */
    public function getExpertPartOneScreenshot()
    {
        return $this->expertPartOneScreenshot;
    }

    /**
     * @param mixed $expertPartOneScreenshot
     */
    public function setExpertPartOneScreenshot($expertPartOneScreenshot)
    {
        $this->expertPartOneScreenshot = $expertPartOneScreenshot;
    }

    /**
     * @ORM\Column(name="expert_part_one_next_screenshot_path", type="string", length=255, nullable=true)
     */
    public $expertPartOneNextScreenshotPath;

    /**
     * @Assert\File(maxSize="2048k", mimeTypesMessage = "Please upload a file smaller than 2Mo")
     */
    private $expertPartOneNextScreenshot;

    /**
     * @return mixed
     */
    public function getExpertPartOneNextScreenshot()
    {
        return $this->expertPartOneNextScreenshot;
    }

    /**
     * @param mixed $expertPartOneNextScreenshot
     */
    public function setExpertPartOneNextScreenshot($expertPartOneNextScreenshot)
    {
        $this->expertPartOneNextScreenshot = $expertPartOneNextScreenshot;
    }

    /**
     * @ORM\Column(name="expert_part_two_screenshot_path", type="string", length=255, nullable=true)
     */
    public $expertPartTwoScreenshotPath;

    /**
     * @Assert\File(maxSize="2048k", mimeTypesMessage = "Please upload a file smaller than 2Mo")
     */
    private $expertPartTwoScreenshot;

    /**
     * @return mixed
     */
    public function getExpertPartTwoScreenshot()
    {
        return $this->expertPartTwoScreenshot;
    }

    /**
     * @param mixed $expertPartTwoScreenshot
     */
    public function setExpertPartTwoScreenshot($expertPartTwoScreenshot)
    {
        $this->expertPartTwoScreenshot = $expertPartTwoScreenshot;
    }

    /**
     * @ORM\Column(name="expert_part_two_next_screenshot_path", type="string", length=255, nullable=true)
     */
    public $expertPartTwoNextScreenshotPath;

    /**
     * @Assert\File(maxSize="2048k", mimeTypesMessage = "Please upload a file smaller than 2Mo")
     */
    private $expertPartTwoNextScreenshot;

    /**
     * @return mixed
     */
    public function getExpertPartTwoNextScreenshot()
    {
        return $this->expertPartTwoNextScreenshot;
    }

    /**
     * @param mixed $expertPartTwoNextScreenshot
     */
    public function setExpertPartTwoNextScreenshot($expertPartTwoNextScreenshot)
    {
        $this->expertPartTwoNextScreenshot = $expertPartTwoNextScreenshot;
    }

    public function getSpeedtestScreenshotAbsolutePath()
    {
        return null === $this->speedtestScreenshotPath ? null : $this->getUploadRootDir().'/'.$this->speedtestScreenshotPath;
    }

    public function getSpeedtestScreenshotWebPath()
    {
        return null === $this->speedtestScreenshotPath ? null : $this->getUploadDir().'/'.$this->speedtestScreenshotPath;
    }

    public function getCloudfrontScreenshotAbsolutePath()
    {
        return null === $this->cloudfrontScreenshotPath ? null : $this->getUploadRootDir().'/'.$this->cloudfrontScreenshotPath;
    }

    public function getCloudfrontScreenshotWebPath()
    {
        return null === $this->cloudfrontScreenshotPath ? null : $this->getUploadDir().'/'.$this->cloudfrontScreenshotPath;
    }

    public function getExpertPartOneScreenshotAbsolutePath()
    {
        return null === $this->expertPartOneScreenshotPath ? null : $this->getUploadRootDir().'/'.$this->expertPartOneScreenshotPath;
    }

    public function getExpertPartOneScreenshotWebPath()
    {
        return null === $this->expertPartOneScreenshotPath ? null : $this->getUploadDir().'/'.$this->expertPartOneScreenshotPath;
    }

    public function getExpertPartOneNextScreenshotAbsolutePath()
    {
        return null === $this->expertPartOneNextScreenshotPath ? null : $this->getUploadRootDir().'/'.$this->expertPartOneNextScreenshotPath;
    }

    public function getExpertPartOneNextScreenshotWebPath()
    {
        return null === $this->expertPartOneNextScreenshotPath ? null : $this->getUploadDir().'/'.$this->expertPartOneNextScreenshotPath;
    }

    public function getExpertPartTwoScreenshotAbsolutePath()
    {
        return null === $this->expertPartTwoScreenshotPath ? null : $this->getUploadRootDir().'/'.$this->expertPartTwoScreenshotPath;
    }

    public function getExpertPartTwoScreenshotWebPath()
    {
        return null === $this->expertPartTwoScreenshotPath ? null : $this->getUploadDir().'/'.$this->expertPartTwoScreenshotPath;
    }

    public function getExpertPartTwoNextScreenshotAbsolutePath()
    {
        return null === $this->expertPartTwoNextScreenshotPath ? null : $this->getUploadRootDir().'/'.$this->expertPartTwoNextScreenshotPath;
    }

    public function getExpertPartTwoNextScreenshotWebPath()
    {
        return null === $this->expertPartTwoNextScreenshotPath ? null : $this->getUploadDir().'/'.$this->expertPartTwoNextScreenshotPath;
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'uploads/documents';
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->speedtestScreenshot) {
            // faites ce que vous voulez pour générer un nom unique
            $this->speedtestScreenshotPath = sha1(uniqid(mt_rand(), true)).'.'.$this->speedtestScreenshot->guessExtension();
        }
        if (null !== $this->cloudfrontScreenshot) {
            // faites ce que vous voulez pour générer un nom unique
            $this->cloudfrontScreenshotPath = sha1(uniqid(mt_rand(), true)).'.'.$this->cloudfrontScreenshot->guessExtension();
        }
        if (null !== $this->expertPartOneScreenshot) {
            // faites ce que vous voulez pour générer un nom unique
            $this->expertPartOneScreenshotPath = sha1(uniqid(mt_rand(), true)).'.'.$this->expertPartOneScreenshot->guessExtension();
        }
        if (null !== $this->expertPartOneNextScreenshot) {
            // faites ce que vous voulez pour générer un nom unique
            $this->expertPartOneNextScreenshotPath = sha1(uniqid(mt_rand(), true)).'.'.$this->expertPartOneNextScreenshot->guessExtension();
        }
        if (null !== $this->expertPartTwoScreenshot) {
            // faites ce que vous voulez pour générer un nom unique
            $this->expertPartTwoScreenshotPath = sha1(uniqid(mt_rand(), true)).'.'.$this->expertPartTwoScreenshot->guessExtension();
        }
        if (null !== $this->expertPartTwoNextScreenshot) {
            // faites ce que vous voulez pour générer un nom unique
            $this->expertPartTwoNextScreenshotPath = sha1(uniqid(mt_rand(), true)).'.'.$this->expertPartTwoNextScreenshot->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->speedtestScreenshot) {
            return;
        } else {
            $this->speedtestScreenshot->move($this->getUploadRootDir(), $this->speedtestScreenshotPath);
            unset($this->speedtestScreenshot);
        }
        if (null === $this->cloudfrontScreenshot) {
            return;
        } else {
            $this->cloudfrontScreenshot->move($this->getUploadRootDir(), $this->cloudfrontScreenshotPath);
            unset($this->cloudfrontScreenshot);
        }
        if (null === $this->expertPartOneScreenshot) {
            return;
        } else {
            $this->expertPartOneScreenshot->move($this->getUploadRootDir(), $this->expertPartOneScreenshotPath);
            unset($this->expertPartOneScreenshot);
        }
        if (null === $this->expertPartOneNextScreenshot) {
            return;
        } else {
            $this->expertPartOneNextScreenshot->move($this->getUploadRootDir(), $this->expertPartOneNextScreenshotPath);
            unset($this->expertPartOneNextScreenshot);
        }
        if (null === $this->expertPartTwoScreenshot) {
            return;
        } else {
            $this->expertPartTwoScreenshot->move($this->getUploadRootDir(), $this->expertPartTwoScreenshotPath);
            unset($this->expertPartTwoScreenshot);
        }
        if (null === $this->expertPartTwoNextScreenshot) {
            return;
        } else {
            $this->expertPartTwoNextScreenshot->move($this->getUploadRootDir(), $this->expertPartTwoNextScreenshotPath);
            unset($this->expertPartTwoNextScreenshot);
        }
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getSpeedtestScreenshotAbsolutePath()) {
            unlink($file);
        }
        if ($file = $this->getCloudfrontScreenshotAbsolutePath()) {
            unlink($file);
        }
        if ($file = $this->getExpertPartOneScreenshotAbsolutePath()) {
            unlink($file);
        }
        if ($file = $this->getExpertPartOneNextScreenshotAbsolutePath()) {
            unlink($file);
        }
        if ($file = $this->getExpertPartTwoScreenshotAbsolutePath()) {
            unlink($file);
        }
        if ($file = $this->getExpertPartTwoNextScreenshotAbsolutePath()) {
            unlink($file);
        }
    }

    /**
     * @ORM\ManyToOne(targetEntity="VideoTest", inversedBy="tester")
     */
    private $videoTests;


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
     * Set tempId
     *
     * @param string $tempId
     * @return Tester
     */
    public function setTempId($tempId)
    {
        $this->tempId = $tempId;

        return $this;
    }

    /**
     * Get tempId
     *
     * @return string
     */
    public function getTempId()
    {
        return $this->tempId;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Tester
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Tester
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Tester
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isp
     *
     * @param string $isp
     * @return Tester
     */
    public function setIsp($isp)
    {
        $this->isp = $isp;

        return $this;
    }

    /**
     * Get isp
     *
     * @return string
     */
    public function getIsp()
    {
        return $this->isp;
    }

    /**
     * Set connexionType
     *
     * @param string $connexionType
     * @return Tester
     */
    public function setConnexionType($connexionType)
    {
        $this->connexionType = $connexionType;

        return $this;
    }

    /**
     * Get connexionType
     *
     * @return string
     */
    public function getConnexionType()
    {
        return $this->connexionType;
    }

    /**
     * Set routerLink
     *
     * @param string $routerLink
     * @return Tester
     */
    public function setRouterLink($routerLink)
    {
        $this->routerLink = $routerLink;

        return $this;
    }

    /**
     * Get routerLink
     *
     * @return string
     */
    public function getRouterLink()
    {
        return $this->routerLink;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     * @return Tester
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set userAgent
     *
     * @param string $userAgent
     * @return Tester
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Get userAgent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Tester
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
     * @return Tester
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
     * Set speedtestScreenshotPath
     *
     * @param string $speedtestScreenshotPath
     * @return Tester
     */
    public function setSpeedtestScreenshotPath($speedtestScreenshotPath)
    {
        $this->speedtestScreenshotPath = $speedtestScreenshotPath;

        return $this;
    }

    /**
     * Get speedtestScreenshotPath
     *
     * @return string
     */
    public function getSpeedtestScreenshotPath()
    {
        return $this->speedtestScreenshotPath;
    }

    /**
     * Set cloudfrontScreenshotPath
     *
     * @param string $cloudfrontScreenshotPath
     * @return Tester
     */
    public function setCloudfrontScreenshotPath($cloudfrontScreenshotPath)
    {
        $this->cloudfrontScreenshotPath = $cloudfrontScreenshotPath;

        return $this;
    }

    /**
     * Get cloudfrontScreenshotPath
     *
     * @return string
     */
    public function getCloudfrontScreenshotPath()
    {
        return $this->cloudfrontScreenshotPath;
    }

    /**
     * Set expertPartOneScreenshotPath
     *
     * @param string $expertPartOneScreenshotPath
     * @return Tester
     */
    public function setExpertPartOneScreenshotPath($expertPartOneScreenshotPath)
    {
        $this->expertPartOneScreenshotPath = $expertPartOneScreenshotPath;

        return $this;
    }

    /**
     * Get expertPartOneScreenshotPath
     *
     * @return string
     */
    public function getExpertPartOneScreenshotPath()
    {
        return $this->expertPartOneScreenshotPath;
    }

    /**
     * Set expertPartTwoScreenshotPath
     *
     * @param string $expertPartTwoScreenshotPath
     * @return Tester
     */
    public function setExpertPartTwoScreenshotPath($expertPartTwoScreenshotPath)
    {
        $this->expertPartTwoScreenshotPath = $expertPartTwoScreenshotPath;

        return $this;
    }

    /**
     * Get expertPartTwoScreenshotPath
     *
     * @return string
     */
    public function getExpertPartTwoScreenshotPath()
    {
        return $this->expertPartTwoScreenshotPath;
    }

    /**
     * Set videoTests
     *
     * @param \remiii\AWSDownloadCheckBundle\Entity\VideoTest $videoTests
     * @return Tester
     */
    public function setVideoTests(\remiii\AWSDownloadCheckBundle\Entity\VideoTest $videoTests = null)
    {
        $this->videoTests = $videoTests;

        return $this;
    }

    /**
     * Get videoTests
     *
     * @return \remiii\AWSDownloadCheckBundle\Entity\VideoTest
     */
    public function getVideoTests()
    {
        return $this->videoTests;
    }

    /**
     * Set expertPartOneNextScreenshotPath
     *
     * @param string $expertPartOneNextScreenshotPath
     * @return Tester
     */
    public function setExpertPartOneNextScreenshotPath($expertPartOneNextScreenshotPath)
    {
        $this->expertPartOneNextScreenshotPath = $expertPartOneNextScreenshotPath;

        return $this;
    }

    /**
     * Get expertPartOneNextScreenshotPath
     *
     * @return string
     */
    public function getExpertPartOneNextScreenshotPath()
    {
        return $this->expertPartOneNextScreenshotPath;
    }

    /**
     * Set expertPartTwoNextScreenshotPath
     *
     * @param string $expertPartTwoNextScreenshotPath
     * @return Tester
     */
    public function setExpertPartTwoNextScreenshotPath($expertPartTwoNextScreenshotPath)
    {
        $this->expertPartTwoNextScreenshotPath = $expertPartTwoNextScreenshotPath;

        return $this;
    }

    /**
     * Get expertPartTwoNextScreenshotPath
     *
     * @return string
     */
    public function getExpertPartTwoNextScreenshotPath()
    {
        return $this->expertPartTwoNextScreenshotPath;
    }
}
