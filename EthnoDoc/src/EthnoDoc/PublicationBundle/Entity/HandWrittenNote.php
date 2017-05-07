<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HandWrittenNote
 *
 * @ORM\Table(name="handwrittennote")
 * @ORM\Entity(repositoryClass="EthnoDoc\PublicationBundle\Repository\HandWrittenNoteRepository")
 */
class HandWrittenNote extends Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="handwrittennote_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	
	/**
     * @var string
     *
     * @ORM\Column(name="leadInCoupletFR", type="string", length=255)
     */
    private $leadInCoupletFR;

    /**
     * @var string
     *
     * @ORM\Column(name="leadInRefrainFR", type="string", length=255)
     */
    private $leadInRefrainFR;

    /**
     * @var string
     *
     * @ORM\Column(name="leadInCoupletVO", type="string", length=255)
     */
    private $leadInCoupletVO;

    /**
     * @var string
     *
     * @ORM\Column(name="leadInRefrainVO", type="string", length=255)
     */
    private $leadInRefrainVO;

    /**
     * @var string
     *
     * @ORM\Column(name="culture", type="string", length=255)
     */
    private $culture;

    /**
     * @var string
     *
     * @ORM\Column(name="coiraultTheme", type="string", length=255)
     */
    private $coiraultTheme;

    /**
     * @var string
     *
     * @ORM\Column(name="coiraultNumber", type="string", length=255)
     */
    private $coiraultNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="laforteNumber", type="string", length=255)
     */
    private $laforteNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="precotationEthnodoc", type="string", length=255)
     */
    private $precotationEthnodoc;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\UsesCircumstance", cascade={"persist"})
	 * @ORM\JoinTable(name="handwrittennote_usescircumstance",
     *      joinColumns={@ORM\JoinColumn(name="handwrittennote_id", referencedColumnName="handwrittennote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="usescircumstance_id", referencedColumnName="usescircumstance_id")}
     *      )
     */
    private $usesCircumstances;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\KeyWord", cascade={"persist"})
	 * @ORM\JoinTable(name="handwrittennote_keyword",
     *      joinColumns={@ORM\JoinColumn(name="handwrittennote_id", referencedColumnName="handwrittennote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="keyword_id", referencedColumnName="keyword_id")}
     *      )
     */
    private $keywords;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\FunctionUse", cascade={"persist"})
	 * @ORM\JoinTable(name="handwrittennote_functionuse",
     *      joinColumns={@ORM\JoinColumn(name="handwrittennote_id", referencedColumnName="handwrittennote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="functionuse_id", referencedColumnName="functionuse_id")}
     *      )
     */
    private $functionUses;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Instrument", cascade={"persist"})
	 * @ORM\JoinTable(name="handwrittennote_instrument",
     *      joinColumns={@ORM\JoinColumn(name="handwrittennote_id", referencedColumnName="handwrittennote_id")},
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
     * @ORM\Column(name="authorAncient", type="string", length=255)
     */
    private $authorAncient;

    /**
     * @var string
     *
     * @ORM\Column(name="traditionalAuthor", type="string", length=255)
     */
    private $traditionalAuthor;

    /**
     * @var string
     *
     * @ORM\Column(name="publisherAncient", type="string", length=255)
     */
    private $publisherAncient;

    /**
     * @var string
     *
     * @ORM\Column(name="traditionalPublisher", type="string", length=255)
     */
    private $traditionalPublisher;

    /**
     * @ORM\ManyToOne(targetEntity="EthnoDoc\PublicationBundle\Entity\Publisher")
     * @ORM\JoinColumn(name="publisher_id", referencedColumnName="publisher_id")
     */
    private $publisher;

        /**
     * @var string
     *
     * @ORM\Column(name="publisher", type="string", length=255)
     */
    private $lapublisher;
    

    
    /**
     * Set lapublisher
     *
     * @param string $lapublisher
     * @return Note
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set leadInRefrainFR
     *
     * @param string $leadInRefrainFR
     * @return HandWrittenNote
     */
    public function setLeadInRefrainFR($leadInRefrainFR)
    {
        $this->leadInRefrainFR = $leadInRefrainFR;

        return $this;
    }

    /**
     * Get leadInRefrainFR
     *
     * @return string 
     */
    public function getLeadInRefrainFR()
    {
        return $this->leadInRefrainFR;
    }

    /**
     * Set leadInCoupletVO
     *
     * @param string $leadInCoupletVO
     * @return HandWrittenNote
     */
    public function setLeadInCoupletVO($leadInCoupletVO)
    {
        $this->leadInCoupletVO = $leadInCoupletVO;

        return $this;
    }

    /**
     * Get leadInCoupletVO
     *
     * @return string 
     */
    public function getLeadInCoupletVO()
    {
        return $this->leadInCoupletVO;
    }

    /**
     * Set leadInRefrainVO
     *
     * @param string $leadInRefrainVO
     * @return HandWrittenNote
     */
    public function setLeadInRefrainVO($leadInRefrainVO)
    {
        $this->leadInRefrainVO = $leadInRefrainVO;

        return $this;
    }

    /**
     * Get leadInRefrainVO
     *
     * @return string 
     */
    public function getLeadInRefrainVO()
    {
        return $this->leadInRefrainVO;
    }

    /**
     * Set culture
     *
     * @param string $culture
     * @return HandWrittenNote
     */
    public function setCulture($culture)
    {
        $this->culture = $culture;

        return $this;
    }

    /**
     * Get culture
     *
     * @return string 
     */
    public function getCulture()
    {
        return $this->culture;
    }

    /**
     * Set coiraultTheme
     *
     * @param string $coiraultTheme
     * @return HandWrittenNote
     */
    public function setCoiraultTheme($coiraultTheme)
    {
        $this->coiraultTheme = $coiraultTheme;

        return $this;
    }

    /**
     * Get coiraultTheme
     *
     * @return string 
     */
    public function getCoiraultTheme()
    {
        return $this->coiraultTheme;
    }

    /**
     * Set coiraultNumber
     *
     * @param string $coiraultNumber
     * @return HandWrittenNote
     */
    public function setCoiraultNumber($coiraultNumber)
    {
        $this->coiraultNumber = $coiraultNumber;

        return $this;
    }

    /**
     * Get coiraultNumber
     *
     * @return string 
     */
    public function getCoiraultNumber()
    {
        return $this->coiraultNumber;
    }

    /**
     * Set laforteNumber
     *
     * @param string $laforteNumber
     * @return HandWrittenNote
     */
    public function setLaforteNumber($laforteNumber)
    {
        $this->laforteNumber = $laforteNumber;

        return $this;
    }

    /**
     * Get laforteNumber
     *
     * @return string 
     */
    public function getLaforteNumber()
    {
        return $this->laforteNumber;
    }

    /**
     * Set precotationEthnodoc
     *
     * @param string $precotationEthnodoc
     * @return HandWrittenNote
     */
    public function setPrecotationEthnodoc($precotationEthnodoc)
    {
        $this->precotationEthnodoc = $precotationEthnodoc;

        return $this;
    }

    /**
     * Get precotationEthnodoc
     *
     * @return string 
     */
    public function getPrecotationEthnodoc()
    {
        return $this->precotationEthnodoc;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usesCircumstances = new \Doctrine\Common\Collections\ArrayCollection();
        $this->keywords = new \Doctrine\Common\Collections\ArrayCollection();
        $this->functionUses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->instruments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add usesCircumstances
     *
     * @param \EthnoDoc\PublicationBundle\Entity\UsesCircumstance $usesCircumstances
     * @return HandWrittenNote
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
     * @return HandWrittenNote
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
     * @return HandWrittenNote
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
     * @return HandWrittenNote
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
     * @return HandWrittenNote
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
     * @return HandWrittenNote
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
     * @return HandWrittenNote
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
     * Set leadInCoupletFR
     *
     * @param string $leadInCoupletFR
     * @return HandWrittenNote
     */
    public function setLeadInCoupletFR($leadInCoupletFR)
    {
        $this->leadInCoupletFR = $leadInCoupletFR;

        return $this;
    }

    /**
     * Get leadInCoupletFR
     *
     * @return string 
     */
    public function getLeadInCoupletFR()
    {
        return $this->leadInCoupletFR;
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

    /**
     * Set authorAncient
     *
     * @param string $authorAncient
     * @return HandWrittenNote
     */
    public function setAuthorAncient($authorAncient)
    {
        $this->authorAncient = $authorAncient;

        return $this;
    }

    /**
     * Get authorAncient
     *
     * @return string 
     */
    public function getAuthorAncient()
    {
        return $this->authorAncient;
    }

    /**
     * Set traditionalAuthor
     *
     * @param string $traditionalAuthor
     * @return HandWrittenNote
     */
    public function setTraditionalAuthor($traditionalAuthor)
    {
        $this->traditionalAuthor = $traditionalAuthor;

        return $this;
    }

    /**
     * Get traditionalAuthor
     *
     * @return string 
     */
    public function getTraditionalAuthor()
    {
        return $this->traditionalAuthor;
    }

    /**
     * Set publisherAncient
     *
     * @param string $publisherAncient
     * @return HandWrittenNote
     */
    public function setPublisherAncient($publisherAncient)
    {
        $this->publisherAncient = $publisherAncient;

        return $this;
    }

    /**
     * Get publisherAncient
     *
     * @return string 
     */
    public function getPublisherAncient()
    {
        return $this->publisherAncient;
    }

    /**
     * Set traditionalPublisher
     *
     * @param string $traditionalPublisher
     * @return HandWrittenNote
     */
    public function setTraditionalPublisher($traditionalPublisher)
    {
        $this->traditionalPublisher = $traditionalPublisher;

        return $this;
    }

    /**
     * Get traditionalPublisher
     *
     * @return string 
     */
    public function getTraditionalPublisher()
    {
        return $this->traditionalPublisher;
    }

    /**
    * Set publisher
    *
    * @param \EthnoDoc\PublicationBundle\Entity\Publisher $publisher
    * @return HandWrittenNote
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


}


