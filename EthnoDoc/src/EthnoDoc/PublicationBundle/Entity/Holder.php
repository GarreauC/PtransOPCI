<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Holder
 *
 * @ORM\Table(name="holder")
 * @ORM\Entity
 */
class Holder
{
    /**
     * @var integer
     *
     * @ORM\Column(name="holder_id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="holder", type="string", length=255)
     */
    private $holder;


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
     * Set holder
     *
     * @param string $holder
     * @return Holder
     */
    public function setHolder($holder)
    {
        $this->holder = $holder;

        return $this;
    }

    /**
     * Get holder
     *
     * @return string 
     */
    public function getHolder()
    {
        return $this->holder;
    }
}
