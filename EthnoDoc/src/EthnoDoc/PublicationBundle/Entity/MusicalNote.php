<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MusicalNote
 *
 * @ORM\MappedSuperclass
 */
class MusicalNote extends Note
{
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
     * Set leadInCoupletFR
     *
     * @param string $leadInCoupletFR
     * @return MusicalNote
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
     * Set leadInRefrainFR
     *
     * @param string $leadInRefrainFR
     * @return MusicalNote
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
     * @return MusicalNote
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
     * @return MusicalNote
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
     * @return MusicalNote
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
     * @return MusicalNote
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
     * @return MusicalNote
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
     * @return MusicalNote
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
     * @return MusicalNote
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
     * Set authorAncient
     *
     * @param string $authorAncient
     * @return MusicalNote
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
     * @return MusicalNote
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
     * @return MusicalNote
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
     * @return MusicalNote
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
}
