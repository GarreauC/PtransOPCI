<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcoVideoGraphyNote
 *
 * @ORM\Table(name="icovideographynote")
 * @ORM\Entity(repositoryClass="EthnoDoc\PublicationBundle\Repository\IcoVideoGraphyNoteRepository")
 */
class IcoVideoGraphyNote extends Note
{
	/**
     * @var integer
     *
     * @ORM\Column(name="icovideographynote_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	
	/**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;
	
	/**
     * @var string
     *
     * @ORM\Column(name="right", type="integer")
     */
    private $right;
	
	/**
     * @var string
     *
     * @ORM\Column(name="partner", type="string", length=255)
     */
    private $parner;

    /**
     * @var string
     *
     * @ORM\Column(name="resolution", type="string", length=255)
     */
    private $resolution;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Witness", cascade={"persist"})
	 * @ORM\JoinTable(name="icovideographynote_witness",
     *      joinColumns={@ORM\JoinColumn(name="icovideographynote_id", referencedColumnName="icovideographynote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="witness_id", referencedColumnName="witness_id")}
     *      )
     */
    private $witnesses;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\KeyWord", cascade={"persist"})
	 * @ORM\JoinTable(name="icovideographynote_keyword",
     *      joinColumns={@ORM\JoinColumn(name="icovideographynote_id", referencedColumnName="icovideographynote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="keyword_id", referencedColumnName="keyword_id")}
     *      )
     */
    private $keywords;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Instrument", cascade={"persist"})
	 * @ORM\JoinTable(name="icovideographynote_instrument",
     *      joinColumns={@ORM\JoinColumn(name="icovideographynote_id", referencedColumnName="icovideographynote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="instrument_id", referencedColumnName="instrument_id")}
     *      )
     */
    private $instruments;
	
	/**
     * @ORM\ManyToOne(targetEntity="EthnoDoc\PublicationBundle\Entity\Holder")
	 * @ORM\JoinColumn(name="holder_id", referencedColumnName="holder_id")
     */
    private $holder;
	
	/**
     * @ORM\ManyToOne(targetEntity="EthnoDoc\PublicationBundle\Entity\Collection")
	 * @ORM\JoinColumn(name="collection_id", referencedColumnName="collection_id")
     */
    private $collection;
	
	/**
     * @ORM\ManyToOne(targetEntity="EthnoDoc\PublicationBundle\Entity\Locality")
	 * @ORM\JoinColumn(name="locality_id", referencedColumnName="locality_id")
     */
    private $locality;
	
	/**
     * @ORM\ManyToOne(targetEntity="EthnoDoc\PublicationBundle\Entity\Decenie")
	 * @ORM\JoinColumn(name="decenie_id", referencedColumnName="decenie_id")
     */
    private $decenie;



    /**
     * @var string
     *
     * @ORM\Column(name="survey", type="string", length=255)
     */
    private $survey;

    /**
     * @var string
     *
     * @ORM\Column(name="publisher", type="string", length=255)
     */
    private $lapublisher;
    
    /**
     * @ORM\ManyToOne(targetEntity="EthnoDoc\PublicationBundle\Entity\Publisher")
     * @ORM\JoinColumn(name="publisher_id", referencedColumnName="publisher_id")
     */
    private $publisher;

    /**
     * Set lapublisher
     *
     * @param string $lapublisher
     * @return IcoVideoGraphyNote
     */
    public function setLapublisher($lapublisher)
    {
        $this->lapublisher = $lapublisher;

        return $this;
    }

    /**
     * Get lapublisher
     *
     * @return string 
     */
    public function getLapublisher()
    {
        return $this->lapublisher;
    }



    /**
     * Set publisher
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Publisher $publisher
     * @return IcoVideoGraphyNote
     */
    public function setPublisher(\EthnoDoc\PublicationBundle\Entity\Publisher $publisher = null)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return \EthnoDoc\PublicationBundle\Entity\Publisher 
     */
    public function getPublisher()
    {
        return $this->publisher;
    }



    /**
     * Set survey
     *
     * @param string $survey
     * @return IcoVideoGraphyNote
     */
    public function setSurvey($survey)
    {
        $this->survey = $survey;

        return $this;
    }

    /**
     * Get survey
     *
     * @return string 
     */
    public function getSurvey()
    {
        return $this->survey;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->witnesses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->keywords = new \Doctrine\Common\Collections\ArrayCollection();
        $this->instruments = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set color
     *
     * @param string $color
     * @return IcoVideoGraphyNote
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set right
     *
     * @param integer $right
     * @return IcoVideoGraphyNote
     */
    public function setRight($right)
    {
        $this->right = $right;

        return $this;
    }

    /**
     * Get right
     *
     * @return integer 
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * Set parner
     *
     * @param string $parner
     * @return IcoVideoGraphyNote
     */
    public function setParner($parner)
    {
        $this->parner = $parner;

        return $this;
    }

    /**
     * Get parner
     *
     * @return string 
     */
    public function getParner()
    {
        return $this->parner;
    }

    /**
     * Set resolution
     *
     * @param string $resolution
     * @return IcoVideoGraphyNote
     */
    public function setResolution($resolution)
    {
        $this->resolution = $resolution;

        return $this;
    }

    /**
     * Get resolution
     *
     * @return string 
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * Add witnesses
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Witness $witnesses
     * @return IcoVideoGraphyNote
     */
    public function addWitness(\EthnoDoc\PublicationBundle\Entity\Witness $witnesses)
    {
        $this->witnesses[] = $witnesses;

        return $this;
    }

    /**
     * Remove witnesses
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Witness $witnesses
     */
    public function removeWitness(\EthnoDoc\PublicationBundle\Entity\Witness $witnesses)
    {
        $this->witnesses->removeElement($witnesses);
    }

    /**
     * Get witnesses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWitnesses()
    {
        return $this->witnesses;
    }

    /**
     * Add keywords
     *
     * @param \EthnoDoc\PublicationBundle\Entity\KeyWord $keywords
     * @return IcoVideoGraphyNote
     */
    public function addKeyword(\EthnoDoc\PublicationBundle\Entity\KeyWord $keywords)
    {
        $this->keywords[] = $keywords;

        return $this;
    }

    /**
     * Remove keywords
     *
     * @param \EthnoDoc\PublicationBundle\Entity\KeyWord $keywords
     */
    public function removeKeyword(\EthnoDoc\PublicationBundle\Entity\KeyWord $keywords)
    {
        $this->keywords->removeElement($keywords);
    }

    /**
     * Get keywords
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Add instruments
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Instrument $instruments
     * @return IcoVideoGraphyNote
     */
    public function addInstrument(\EthnoDoc\PublicationBundle\Entity\Instrument $instruments)
    {
        $this->instruments[] = $instruments;

        return $this;
    }

    /**
     * Remove instruments
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Instrument $instruments
     */
    public function removeInstrument(\EthnoDoc\PublicationBundle\Entity\Instrument $instruments)
    {
        $this->instruments->removeElement($instruments);
    }

    /**
     * Get instruments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInstruments()
    {
        return $this->instruments;
    }

    /**
     * Set holder
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Holder $holder
     * @return IcoVideoGraphyNote
     */
    public function setHolder(\EthnoDoc\PublicationBundle\Entity\Holder $holder = null)
    {
        $this->holder = $holder;

        return $this;
    }

    /**
     * Get holder
     *
     * @return \EthnoDoc\PublicationBundle\Entity\Holder 
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * Set collection
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Collection $collection
     * @return IcoVideoGraphyNote
     */
    public function setCollection(\EthnoDoc\PublicationBundle\Entity\Collection $collection = null)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get collection
     *
     * @return \EthnoDoc\PublicationBundle\Entity\Collection 
     */
    public function getCollection()
    {
        return $this->collection;
    }



    /**
     * Set locality
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Locality $locality
     * @return IcoVideoGraphyNote
     */
    public function setLocality(\EthnoDoc\PublicationBundle\Entity\Locality $locality = null)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality
     *
     * @return \EthnoDoc\PublicationBundle\Entity\Locality 
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set decenie
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Decenie $decenie
     * @return IcoVideoGraphyNote
     */
    public function setDecenie(\EthnoDoc\PublicationBundle\Entity\Decenie $decenie = null)
    {
        $this->decenie = $decenie;

        return $this;
    }

    /**
     * Get decenie
     *
     * @return \EthnoDoc\PublicationBundle\Entity\Decenie 
     */
    public function getDecenie()
    {
        return $this->decenie;
    }
}
