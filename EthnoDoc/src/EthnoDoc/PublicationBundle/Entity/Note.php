<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Note
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
	
	/**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=255)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;
	
	/**
     * @var string
     *
     * @ORM\Column(name="type_document", type="string", length=255)
     */
    private $type_document;
	
	/**
     * @var string
     *
     * @ORM\Column(name="cle_reel", type="integer")
     */
    private $cle_reel;
	
	/**
     * @var string
     *
     * @ORM\Column(name="collection", type="string", length=255)
     */
    private $lacollection;
	
	/**
     * @var string
     *
     * @ORM\Column(name="holder", type="string", length=255)
     */
    private $lholder;
	
	/**
     * @var string
     *
     * @ORM\Column(name="locality", type="string", length=255)
     */
    private $lalocality;
	
	/**
     * @var string
     *
     * @ORM\Column(name="canton", type="string", length=255)
     */
    private $lecanton;
	
	/**
     * @var string
     *
     * @ORM\Column(name="department", type="string", length=255)
     */
    private $ledepartment;
	
	/**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $lacountry;
	
	/**
     * @var string
     *
     * @ORM\Column(name="consultation", type="string", length=255)
     */
    private $consultation;



    /**
     * Set title
     *
     * @param string $title
     * @return Note
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
	
	/**
     * Set date
     *
     * @param string $date
     * @return Note
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Note
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Note
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set type_document
     *
     * @param string $typeDocument
     * @return Note
     */
    public function setTypeDocument($typeDocument)
    {
        $this->type_document = $typeDocument;

        return $this;
    }

    /**
     * Get type_document
     *
     * @return string 
     */
    public function getTypeDocument()
    {
        return $this->type_document;
    }

    /**
     * Set cle_reel
     *
     * @param integer $cleReel
     * @return Note
     */
    public function setCleReel($cleReel)
    {
        $this->cle_reel = $cleReel;

        return $this;
    }

    /**
     * Get cle_reel
     *
     * @return integer 
     */
    public function getCleReel()
    {
        return $this->cle_reel;
    }

    /**
     * Set lacollection
     *
     * @param string $lacollection
     * @return Note
     */
    public function setLacollection($lacollection)
    {
        $this->lacollection = $lacollection;

        return $this;
    }

    /**
     * Get lacollection
     *
     * @return string 
     */
    public function getLacollection()
    {
        return $this->lacollection;
    }

    /**
     * Set lholder
     *
     * @param string $lholder
     * @return Note
     */
    public function setLholder($lholder)
    {
        $this->lholder = $lholder;

        return $this;
    }

    /**
     * Get lholder
     *
     * @return string 
     */
    public function getLholder()
    {
        return $this->lholder;
    }

    /**
     * Set lalocality
     *
     * @param string $lalocality
     * @return Note
     */
    public function setLalocality($lalocality)
    {
        $this->lalocality = $lalocality;

        return $this;
    }

    /**
     * Get lalocality
     *
     * @return string 
     */
    public function getLalocality()
    {
        return $this->lalocality;
    }

    /**
     * Set lecanton
     *
     * @param string $lecanton
     * @return Note
     */
    public function setLecanton($lecanton)
    {
        $this->lecanton = $lecanton;

        return $this;
    }

    /**
     * Get lecanton
     *
     * @return string 
     */
    public function getLecanton()
    {
        return $this->lecanton;
    }

    /**
     * Set ledepartment
     *
     * @param string $ledepartment
     * @return Note
     */
    public function setLedepartment($ledepartment)
    {
        $this->ledepartment = $ledepartment;

        return $this;
    }

    /**
     * Get ledepartment
     *
     * @return string 
     */
    public function getLedepartment()
    {
        return $this->ledepartment;
    }

    /**
     * Set lacountry
     *
     * @param string $lacountry
     * @return Note
     */
    public function setLacountry($lacountry)
    {
        $this->lacountry = $lacountry;

        return $this;
    }

    /**
     * Get lacountry
     *
     * @return string 
     */
    public function getLacountry()
    {
        return $this->lacountry;
    }

    /**
     * Set consultation
     *
     * @param string $consultation
     * @return Note
     */
    public function setConsultation($consultation)
    {
        $this->consultation = $consultation;

        return $this;
    }

    /**
     * Get consultation
     *
     * @return string 
     */
    public function getConsultation()
    {
        return $this->consultation;
    }
}
