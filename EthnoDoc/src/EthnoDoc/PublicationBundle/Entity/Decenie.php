<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Decenie
 *
 * @ORM\Table(name="decenie")
 * @ORM\Entity
 */
class Decenie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="decenie_id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="decenie", type="integer")
     */
    private $decenie;
	
	/**
     * @var string
     *
     * @ORM\Column(name="century", type="string", length=255)
     */
    private $century;
	
	/**
     * @var string
     *
     * @ORM\Column(name="millennium", type="string", length=255)
     */
    private $millennium;


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
     * Set decenie
     *
     * @param integer $decenie
     * @return Decenie
     */
    public function setDecenie($decenie)
    {
        $this->decenie = $decenie;

        return $this;
    }

    /**
     * Get decenie
     *
     * @return integer 
     */
    public function getDecenie()
    {
        return $this->decenie;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Decenie
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set century
     *
     * @param string $century
     * @return Decenie
     */
    public function setCentury($century)
    {
        $this->century = $century;

        return $this;
    }

    /**
     * Get century
     *
     * @return string 
     */
    public function getCentury()
    {
        return $this->century;
    }

    /**
     * Set millennium
     *
     * @param string $millennium
     * @return Decenie
     */
    public function setMillennium($millennium)
    {
        $this->millennium = $millennium;

        return $this;
    }

    /**
     * Get millennium
     *
     * @return string 
     */
    public function getMillennium()
    {
        return $this->millennium;
    }
}
