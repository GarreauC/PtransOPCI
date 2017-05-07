<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Canton
 *
 * @ORM\Table(name="canton")
 * @ORM\Entity
 */
class Canton
{
    /**
     * @var integer
     *
     * @ORM\Column(name="canton_id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="canton", type="string", length=255)
     */
    private $canton;
	
	/**
     * @ORM\ManyToOne(targetEntity="EthnoDoc\PublicationBundle\Entity\Department")
	 * @ORM\JoinColumn(name="department_id", referencedColumnName="department_id")
     */
    private $department;


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
     * Set Canton
     *
     * @param string $canton
     * @return canton
     */
    public function setCanton($canton)
    {
        $this->canton = $canton;

        return $this;
    }

    /**
     * Get Canton
     *
     * @return string 
     */
    public function getCanton()
    {
        return $this->canton;
    }

    /**
     * Set department
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Department $department
     * @return Canton
     */
    public function setDepartment(\EthnoDoc\PublicationBundle\Entity\Department $department = null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return \EthnoDoc\PublicationBundle\Entity\Department 
     */
    public function getDepartment()
    {
        return $this->department;
    }
}
