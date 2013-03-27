<?php

namespace Musee\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Musee\BlogBundle\Entity\CommentaireRepository")
 */
class Commentaire
{
	/**
     * @ORM\ManyToOne(targetEntity="Musee\BlogBundle\Entity\Article")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;
	
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
     * @ORM\Column(name="Auteur", type="string", length=255)
     */
    private $Auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="Contenu", type="text")
     */
    private $Contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="datetime")
     */
    private $Date;


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
     * Set Auteur
     *
     * @param string $auteur
     * @return Commentaire
     */
    public function setAuteur($auteur)
    {
        $this->Auteur = $auteur;
    
        return $this;
    }

    /**
     * Get Auteur
     *
     * @return string 
     */
    public function getAuteur()
    {
        return $this->Auteur;
    }

    /**
     * Set Contenu
     *
     * @param string $contenu
     * @return Commentaire
     */
    public function setContenu($contenu)
    {
        $this->Contenu = $contenu;
    
        return $this;
    }

    /**
     * Get Contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->Contenu;
    }

    /**
     * Set Date
     *
     * @param \DateTime $date
     * @return Commentaire
     */
    public function setDate($date)
    {
        $this->Date = $date;
    
        return $this;
    }

    /**
     * Get Date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * Set article
     *
     * @param \Musee\BlogBundle\Entity\Article $article
     * @return Commentaire
     */
    public function setArticle(\Musee\BlogBundle\Entity\Article $article)
    {
        $this->article = $article;
    
        return $this;
    }

    /**
     * Get article
     *
     * @return \Musee\BlogBundle\Entity\Article 
     */
    public function getArticle()
    {
        return $this->article;
    }
}