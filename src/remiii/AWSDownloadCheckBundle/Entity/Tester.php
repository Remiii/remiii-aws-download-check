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
     * @ORM\ManyToOne(targetEntity="VideoTest", inversedBy="tester")
     */
    private $videoTests;
}
