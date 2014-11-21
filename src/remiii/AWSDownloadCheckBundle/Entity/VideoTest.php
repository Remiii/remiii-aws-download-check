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
 * @ORM\Entity
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
}
