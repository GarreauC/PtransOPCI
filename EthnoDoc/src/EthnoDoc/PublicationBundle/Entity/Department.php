<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Department
 *
 * @ORM\Table(name="department")
 * @ORM\Entity
 */
class Department
{
    /**
     * @var integer
     *
     * @ORM\Column(name="department_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="department", type="string", length=255)
     */
    private $department;
	
	/**
     * @ORM\ManyToOne(targetEntity="EthnoDoc\PublicationBundle\Entity\Country")
	 * @ORM\JoinColumn(name="country_id", referencedColumnName="country_id")
     */
    private $country;


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
     * Set department
     *
     * @param string $department
     * @return Department
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return string 
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set country
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Country $country
     * @return Department
     */
    public function setCountry(\EthnoDoc\PublicationBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \EthnoDoc\PublicationBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }
}
