<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rfid_act
 *
 * @ORM\Table(name="rfid_act")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\Rfid_actRepository")
 */
class Rfid_act
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Rfid_id", type="string", length=10)
     */
    private $rfidId;

    /**
     * @var string
     *
     * @ORM\Column(name="Reader_id", type="string", length=1)
     */
    private $readerId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="En_time", type="datetime")
     */
    private $enTime;

    /**
     * @var bool
     *
     * @ORM\Column(name="En_allowed", type="boolean")
     */
    private $enAllowed;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set rfidId
     *
     * @param string $rfidId
     *
     * @return Rfid_act
     */
    public function setRfidId($rfidId)
    {
        $this->rfidId = $rfidId;

        return $this;
    }

    /**
     * Get rfidId
     *
     * @return string
     */
    public function getRfidId()
    {
        return $this->rfidId;
    }

    /**
     * Set readerId
     *
     * @param string $readerId
     *
     * @return Rfid_act
     */
    public function setReaderId($readerId)
    {
        $this->readerId = $readerId;

        return $this;
    }

    /**
     * Get readerId
     *
     * @return string
     */
    public function getReaderId()
    {
        return $this->readerId;
    }

    /**
     * Set enTime
     *
     * @param \DateTime $enTime
     *
     * @return Rfid_act
     */
    public function setEnTime($enTime)
    {
        $this->enTime = $enTime;

        return $this;
    }

    /**
     * Get enTime
     *
     * @return \DateTime
     */
    public function getEnTime()
    {
        return $this->enTime;
    }

    /**
     * Set enAllowed
     *
     * @param boolean $enAllowed
     *
     * @return Rfid_act
     */
    public function setEnAllowed($enAllowed)
    {
        $this->enAllowed = $enAllowed;

        return $this;
    }

    /**
     * Get enAllowed
     *
     * @return bool
     */
    public function getEnAllowed()
    {
        return $this->enAllowed;
    }
}

