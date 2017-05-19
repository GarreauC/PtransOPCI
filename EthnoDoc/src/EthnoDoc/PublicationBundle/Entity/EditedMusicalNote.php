<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EditedMusicalNote
 *
 * @ORM\Table(name="editedmusicalnote")
 * @ORM\Entity(repositoryClass="EthnoDoc\PublicationBundle\Repository\EditedMusicalNoteRepository")
 */
class EditedMusicalNote extends MusicalNote
{
    /**
     * @var integer
     *
     * @ORM\Column(name="editedmusicalnote_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="phonogramTitle", type="string", length=255)
     */
    private $phonogramTitle;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Interpret", cascade={"persist"})
	 * @ORM\JoinTable(name="editedmusicalnote_interpret",
     *      joinColumns={@ORM\JoinColumn(name="editedmusicalnote_id", referencedColumnName="editedmusicalnote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="interpret_id", referencedColumnName="interpret_id")}
     *      )
     */
    private $interprets;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\UsesCircumstance", cascade={"persist"})
	 * @ORM\JoinTable(name="editedmusicalnote_usescircumstance",
     *      joinColumns={@ORM\JoinColumn(name="editedmusicalnote_id", referencedColumnName="editedmusicalnote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="usescircumstance_id", referencedColumnName="usescircumstance_id")}
     *      )
     */
    private $usesCircumstances;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\KeyWord", cascade={"persist"})
	 * @ORM\JoinTable(name="editedmusicalnote_keyword",
     *      joinColumns={@ORM\JoinColumn(name="editedmusicalnote_id", referencedColumnName="editedmusicalnote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="keyword_id", referencedColumnName="keyword_id")}
     *      )
     */
    private $keywords;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\FunctionUse", cascade={"persist"})
	 * @ORM\JoinTable(name="editedmusicalnote_functionuse",
     *      joinColumns={@ORM\JoinColumn(name="editedmusicalnote_id", referencedColumnName="editedmusicalnote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="functionuse_id", referencedColumnName="functionuse_id")}
     *      )
     */
    private $functionUses;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Instrument", cascade={"persist"})
	 * @ORM\JoinTable(name="editedmusicalnote_instrument",
     *      joinColumns={@ORM\JoinColumn(name="editedmusicalnote_id", referencedColumnName="editedmusicalnote_id")},
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
     * @return EditedMusicalNote
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
     * @return EditedMusicalNote
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set phonogramTitle
     *
     * @param string $phonogramTitle
     * @return EditedMusicalNote
     */
    public function setPhonogramTitle($phonogramTitle)
    {
        $this->phonogramTitle = $phonogramTitle;

        return $this;
    }

    /**
     * Get phonogramTitle
     *
     * @return string 
     */
    public function getPhonogramTitle()
    {
        return $this->phonogramTitle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->interprets = new \Doctrine\Common\Collections\ArrayCollection();
        $this->usesCircumstances = new \Doctrine\Common\Collections\ArrayCollection();
        $this->keywords = new \Doctrine\Common\Collections\ArrayCollection();
        $this->functionUses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->instruments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add interprets
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Interpret $interprets
     * @return EditedMusicalNote
     */
    public function addInterpret(\EthnoDoc\PublicationBundle\Entity\Interpret $interprets)
    {
        $this->interprets[] = $interprets;

        return $this;
    }

    /**
     * Remove interprets
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Interpret $interprets
     */
    public function removeInterpret(\EthnoDoc\PublicationBundle\Entity\Interpret $interprets)
    {
        $this->interprets->removeElement($interprets);
    }

    /**
     * Get interprets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInterprets()
    {
        return $this->interprets;
    }

    /**
     * Add usesCircumstances
     *
     * @param \EthnoDoc\PublicationBundle\Entity\UsesCircumstance $usesCircumstances
     * @return EditedMusicalNote
     */
    public function addUsesCircumstance(\EthnoDoc\PublicationBundle\Entity\UsesCircumstance $usesCircumstances)
    {
        $this->usesCircumstances[] = $usesCircumstances;

        return $this;
    }

    /**
     * Remove usesCircumstances
     *
     * @param \EthnoDoc\PublicationBundle\Entity\UsesCircumstance $usesCircumstances
     */
    public function removeUsesCircumstance(\EthnoDoc\PublicationBundle\Entity\UsesCircumstance $usesCircumstances)
    {
        $this->usesCircumstances->removeElement($usesCircumstances);
    }

    /**
     * Get usesCircumstances
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsesCircumstances()
    {
        return $this->usesCircumstances;
    }

    /**
     * Add keywords
     *
     * @param \EthnoDoc\PublicationBundle\Entity\KeyWord $keywords
     * @return EditedMusicalNote
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
     * Add functionUses
     *
     * @param \EthnoDoc\PublicationBundle\Entity\FunctionUse $functionUses
     * @return EditedMusicalNote
     */
    public function addFunctionUse(\EthnoDoc\PublicationBundle\Entity\FunctionUse $functionUses)
    {
        $this->functionUses[] = $functionUses;

        return $this;
    }

    /**
     * Remove functionUses
     *
     * @param \EthnoDoc\PublicationBundle\Entity\FunctionUse $functionUses
     */
    public function removeFunctionUse(\EthnoDoc\PublicationBundle\Entity\FunctionUse $functionUses)
    {
        $this->functionUses->removeElement($functionUses);
    }

    /**
     * Get functionUses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFunctionUses()
    {
        return $this->functionUses;
    }

    /**
     * Add instruments
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Instrument $instruments
     * @return EditedMusicalNote
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
     * @return EditedMusicalNote
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
     * @return EditedMusicalNote
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
     * @return EditedMusicalNote
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
