<?php

namespace Musee\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Musee\BlogBundle\Entity\ArticleRepository")
 */
class Article
{
    /**
    * @ORM\OneToOne(targetEntity="Musee\BlogBundle\Entity\Image", cascade={"persist"})
    */
    private $image;

    /**
    * @ORM\OneToOne(targetEntity="Musee\BlogBundle\Entity\TypeArticle", cascade={"persist"})
    */
    private $typeArticle;
	
	/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255)
     */
    private $auteur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
	
	/**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEdition", type="datetime")
     */
    private $dateEdition;


     public function __construct()
	{
		$this->date = new \Datetime;
		$this->dateEdition = new \Datetime;
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
     * Set titre
     *
     * @param string $titre
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Article
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    
        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Article
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    
        return $this;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Article
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set image
     *
     * @param \Musee\BlogBundle\Entity\Image $image
     * @return Article
     */
    public function setImage(\Musee\BlogBundle\Entity\Image $image = null)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return \Musee\BlogBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set typeArticle
     *
     * @param \Musee\BlogBundle\Entity\TypeArticle $typeArticle
     * @return Article
     */
    public function setTypeArticle(\Musee\BlogBundle\Entity\TypeArticle $typeArticle = null)
    {
        $this->typeArticle = $typeArticle;
    
        return $this;
    }

    /**
     * Get typeArticle
     *
     * @return \Musee\BlogBundle\Entity\TypeArticle 
     */
    public function getTypeArticle()
    {
        return $this->typeArticle;
    }
}