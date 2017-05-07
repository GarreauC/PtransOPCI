<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Collection
 *
 * @ORM\Table(name="collection")
 * @ORM\Entity
 */
class Collection
{
    /**
     * @var integer
     *
     * @ORM\Column(name="collection_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="collection", type="string", length=255)
     */
    private $collection;
	
	/**
     * @var string
     *
     * @ORM\Column(name="classement1", type="string", length=255)
     */
    private $classement1;
	
	/**
     * @var string
     *
     * @ORM\Column(name="classement2", type="string", length=255)
     */
    private $classement2;


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
     * Set collection
     *
     * @param string $collection
     * @return Collection
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get collection
     *
     * @return string 
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Set classement1
     *
     * @param string $classement1
     * @return Collection
     */
    public function setClassement1($classement1)
    {
        $this->classement1 = $classement1;

        return $this;
    }

    /**
     * Get classement1
     *
     * @return string 
     */
    public function getClassement1()
    {
        return $this->classement1;
    }

    /**
     * Set classement2
     *
     * @param string $classement2
     * @return Collection
     */
    public function setClassement2($classement2)
    {
        $this->classement2 = $classement2;

        return $this;
    }

    /**
     * Get classement2
     *
     * @return string 
     */
    public function getClassement2()
    {
        return $this->classement2;
    }
}
