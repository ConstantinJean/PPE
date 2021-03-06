<?php

namespace Musee\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeArticle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Musee\BlogBundle\Entity\TypeArticleRepository")
 */
class TypeArticle
{
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
     * @ORM\Column(name="Intitule", type="string", length=255)
     */
    private $Intitule;


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
     * Set Intitule
     *
     * @param string $intitule
     * @return TypeArticle
     */
    public function setIntitule($intitule)
    {
        $this->Intitule = $intitule;
    
        return $this;
    }

    /**
     * Get Intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->Intitule;
    }
}