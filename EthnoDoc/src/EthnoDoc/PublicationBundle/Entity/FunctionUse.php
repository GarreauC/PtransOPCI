<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FunctionUse
 *
 * @ORM\Table(name="functionuse")
 * @ORM\Entity
 */
class FunctionUse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="functionuse_id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="functionUse", type="string", length=255)
     */
    private $functionUse;


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
     * Set functionUse
     *
     * @param string $functionUse
     * @return FunctionUse
     */
    public function setFunctionUse($functionUse)
    {
        $this->functionUse = $functionUse;

        return $this;
    }

    /**
     * Get functionUse
     *
     * @return string 
     */
    public function getFunctionUse()
    {
        return $this->functionUse;
    }
}
