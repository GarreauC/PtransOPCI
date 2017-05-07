<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interpret
 *
 * @ORM\Table(name="interpret")
 * @ORM\Entity
 */
class Interpret
{
    /**
     * @var integer
     *
     * @ORM\Column(name="interpret_id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="interpret", type="string", length=255)
     */
    private $interpret;


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
     * Set interpret
     *
     * @param string $interpret
     * @return Interpret
     */
    public function setInterpret($interpret)
    {
        $this->interpret = $interpret;

        return $this;
    }

    /**
     * Get interpret
     *
     * @return string 
     */
    public function getInterpret()
    {
        return $this->interpret;
    }
}
