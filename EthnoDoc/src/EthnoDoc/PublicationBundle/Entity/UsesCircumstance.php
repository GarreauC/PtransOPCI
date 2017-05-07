<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsesCircumstance
 *
 * @ORM\Table(name="usescircumstance")
 * @ORM\Entity
 */
class UsesCircumstance
{
    /**
     * @var integer
     *
     * @ORM\Column(name="usescircumstance_id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="usesCircumstance", type="string", length=255)
     */
    private $usesCircumstance;


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
     * Set usesCircumstance
     *
     * @param string $usesCircumstance
     * @return UsesCircumstance
     */
    public function setUsesCircumstance($usesCircumstance)
    {
        $this->usesCircumstance = $usesCircumstance;

        return $this;
    }

    /**
     * Get usesCircumstance
     *
     * @return string 
     */
    public function getUsesCircumstance()
    {
        return $this->usesCircumstance;
    }
}
