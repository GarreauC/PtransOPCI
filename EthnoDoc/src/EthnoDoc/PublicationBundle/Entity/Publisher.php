<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publisher
 *
 * @ORM\Table(name="publisher")
 * @ORM\Entity
 */
class Publisher
{
    /**
     * @var integer
     *
     * @ORM\Column(name="publisher_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="publisher", type="string", length=255)
     */
    private $publisher;
	
	/**
     * @var string
     *
     * @ORM\Column(name="classement_pub1", type="string", length=255)
     */
    private $classement_pub1;
	
	/**
     * @var string
     *
     * @ORM\Column(name="classement_pub2", type="string", length=255)
     */
    private $classement_pub2;


    /**
     * @var string
     *
     * @ORM\Column(name="classement_pub3", type="string", length=255)
     */
    
    private $classement_pub3;


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
     * Set Publisher
     *
     * @param string $Publisher
     * @return Publisher
     */
    public function setPublisher($Publisher)
    {
        $this->Publisher = $Publisher;

        return $this;
    }

    /**
     * Get Publisher
     *
     * @return string 
     */
    public function getPublisher()
    {
        return $this->Publisher;
    }

    /**
     * Set classement_pub1
     *
     * @param string $classement_pub1
     * @return Publisher
     */
    public function setClassement_pub1($classement_pub1)
    {
        $this->classement_pub1 = $classement_pub1;

        return $this;
    }

    /**
     * Get classement_pub1
     *
     * @return string 
     */
    public function getClassement_pub1()
    {
        return $this->classement_pub1;
    }

    /**
     * Set classement_pub2
     *
     * @param string $classement_pub2
     * @return Publisher
     */
    public function setClassement_pub2($classement_pub2)
    {
        $this->classement_pub2 = $classement_pub2;

        return $this;
    }

    /**
     * Get classement_pub2
     *
     * @return string 
     */
    public function getClassement_pub2()
    {
        return $this->classement_pub2;
    }


        /**
     * Set classement_pub3
     *
     * @param string $classement_pub3
     * @return Publisher
     */
    public function setClassement_pub3($classement_pub3)
    {
        $this->classement_pub3 = $classement_pub3;

        return $this;
    }

    /**
     * Get classement_pub3
     *
     * @return string 
     */
    public function getClassement_pub3()
    {
        return $this->classement_pub3;
    }
}
