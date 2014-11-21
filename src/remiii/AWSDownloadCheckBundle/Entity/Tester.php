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
 * @ORM\Entity
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
     * @ORM\Column(name="screenshot_path", type="string", length=255, nullable=true)
     */
    public $screenshotPath;

    /**
     * @Assert\File(maxSize="2048k", mimeTypesMessage = "Please upload a file smaller than 2Mo")
     */
    private $screenshot;

    public function getScreenshot()
    {
        return $this->screenshot;
    }

    public function setScreenshot($screenshot)
    {
        $this->screenshot = $screenshot;
    }

    public function getAbsolutePath()
    {
        return null === $this->screenshotPath ? null : $this->getUploadRootDir().'/'.$this->screenshotPath;
    }

    public function getWebPath()
    {
        return null === $this->screenshotPath ? null : $this->getUploadDir().'/'.$this->screenshotPath;
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
        if (null !== $this->screenshot) {
            // faites ce que vous voulez pour générer un nom unique
            $this->screenshotPath = sha1(uniqid(mt_rand(), true)).'.'.$this->screenshot->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->screenshot) {
            return;
        }

        $this->screenshot->move($this->getUploadRootDir(), $this->screenshotPath);

        unset($this->file);
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
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
     * Set screenshotPath
     *
     * @param string $screenshotPath
     * @return Tester
     */
    public function setScreenshotPath($screenshotPath)
    {
        $this->screenshotPath = $screenshotPath;

        return $this;
    }

    /**
     * Get screenshotPath
     *
     * @return string
     */
    public function getScreenshotPath()
    {
        return $this->screenshotPath;
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
}
