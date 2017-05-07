<?php

namespace EthnoDoc\PublicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecipeNote
 *
 * @ORM\Table(name="recipenote")
 * @ORM\Entity(repositoryClass="EthnoDoc\PublicationBundle\Repository\RecipeNoteRepository")
 */
class RecipeNote extends Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="recipenote_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="taste", type="string", length=255)
     */
    private $taste;

    /**
     * @var string
     *
     * @ORM\Column(name="annee", type="integer")
     */
    private $annee;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Witness", cascade={"persist"})
	 * @ORM\JoinTable(name="recipenote_witness",
     *      joinColumns={@ORM\JoinColumn(name="recipenote_id", referencedColumnName="recipenote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="witness_id", referencedColumnName="witness_id")}
     *      )
     */
    private $witnesses;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Ingredient", cascade={"persist"})
     * @ORM\JoinTable(name="recipenote_ingredient",
     *      joinColumns={@ORM\JoinColumn(name="recipenote_id", referencedColumnName="recipenote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="ingredient_id", referencedColumnName="ingredient_id")}
     *      )
	 */
    private $ingredients;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\KeyWord", cascade={"persist"})
	 * @ORM\JoinTable(name="recipenote_keyword",
     *      joinColumns={@ORM\JoinColumn(name="recipenote_id", referencedColumnName="recipenote_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="keyword_id", referencedColumnName="keyword_id")}
     *      )
     */
    private $keywords;
	
	/**
     * @ORM\ManyToMany(targetEntity="EthnoDoc\PublicationBundle\Entity\Instrument", cascade={"persist"})
	 * @ORM\JoinTable(name="recipenote_instrument",
     *      joinColumns={@ORM\JoinColumn(name="recipenote_id", referencedColumnName="recipenote_id")},
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;
	
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
     * Set type
     *
     * @param string $type
     * @return RecipeNote
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set taste
     *
     * @param string $taste
     * @return RecipeNote
     */
    public function setTaste($taste)
    {
        $this->taste = $taste;

        return $this;
    }

    /**
     * Get taste
     *
     * @return string 
     */
    public function getTaste()
    {
        return $this->taste;
    }
	
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->witnesses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ingredients = new \Doctrine\Common\Collections\ArrayCollection();
        $this->keywords = new \Doctrine\Common\Collections\ArrayCollection();
        $this->instruments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add witnesses
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Witness $witnesses
     * @return RecipeNote
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
     * Add ingredients
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Ingredient $ingredients
     * @return RecipeNote
     */
    public function addIngredient(\EthnoDoc\PublicationBundle\Entity\Ingredient $ingredients)
    {
        $this->ingredients[] = $ingredients;

        return $this;
    }

    /**
     * Remove ingredients
     *
     * @param \EthnoDoc\PublicationBundle\Entity\Ingredient $ingredients
     */
    public function removeIngredient(\EthnoDoc\PublicationBundle\Entity\Ingredient $ingredients)
    {
        $this->ingredients->removeElement($ingredients);
    }

    /**
     * Get ingredients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Add keywords
     *
     * @param \EthnoDoc\PublicationBundle\Entity\KeyWord $keywords
     * @return RecipeNote
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
     * @return RecipeNote
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
     * @return RecipeNote
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
     * @return RecipeNote
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
     * @return RecipeNote
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

    /**
     * Set description
     *
     * @param string $description
     * @return RecipeNote
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set annee
     *
     * @param integer $annee
     * @return RecipeNote
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return integer 
     */
    public function getAnnee()
    {
        return $this->annee;
    }
}
