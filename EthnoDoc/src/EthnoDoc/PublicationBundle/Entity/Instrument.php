<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Instrument
 *
 * @ORM\Table(name="instrument")
 * @ORM\Entity
 */
class Instrument
{
    /**
     * @var integer
     *
     * @ORM\Column(name="instrument_id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="instrument", type="string", length=255)
     */
    private $instrument;


    /**
     * Get id
     *
     * @return integer 
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Set instrument
     *
     * @param string $instrument
     * @return Instrument
     */
    public function setInstrument($instrument)
    {
        $this->instrument = $instrument;

        return $this;
    }

    /**
     * Get instrument
     *
     * @return string 
     */
    public function getInstrument()
    {
        return $this->instrument;
    }
}
