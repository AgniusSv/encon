<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rfid
 *
 * @ORM\Table(name="rfid")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\RfidRepository")
 */
class Rfid
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
     * @return Rfid
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
}

