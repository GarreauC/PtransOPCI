<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SpokenArchiveNote
 *
 * @ORM\Table(name="spokenarchivenote")
 * @ORM\Entity(repositoryClass="EthnoDoc\PublicationBundle\Repository\SpokenArchiveNoteRepository")
 */
class SpokenArchiveNote extends Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="spokenarchivenote_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="survey", type="string", length=255)
     */
    private $survey;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Witness", cascade={"persist"})
	 * @ORM\JoinTable(name="spokenarchivenote_witness",
     *      joinColumns={@ORM\JoinColumn(name="spokenarchivenote_id", referencedColumnName="spokenarchivenote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="witness_id", referencedColumnName="witness_id")}
     *      )
     */
    private $witnesses;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\KeyWord", cascade={"persist"})
	 * @ORM\JoinTable(name="spokenarchivenote_keyword",
     *      joinColumns={@ORM\JoinColumn(name="spokenarchivenote_id", referencedColumnName="spokenarchivenote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="keyword_id", referencedColumnName="keyword_id")}
     *      )
     */
    private $keywords;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Instrument", cascade={"persist"})
	 * @ORM\JoinTable(name="spokenarchivenote_instrument",
     *      joinColumns={@ORM\JoinColumn(name="spokenarchivenote_id", referencedColumnName="spokenarchivenote_id")},
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set survey
     *
     * @param string $survey
     * @return SpokenArchiveNote
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
     * Add witnesses
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Witness $witnesses
     * @return SpokenArchiveNote
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
     * @return SpokenArchiveNote
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
     * @return SpokenArchiveNote
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
     * @return SpokenArchiveNote
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
     * @return SpokenArchiveNote
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
     * @return SpokenArchiveNote
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
     * @return EditedMusicalNote
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
