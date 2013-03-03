<?php

namespace Musee\CollectionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatutObjet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Musee\CollectionBundle\Entity\StatutObjetRepository")
 */
class StatutObjet
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
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAquisition", type="date")
     */
    private $dateAquisition;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRetour", type="date")
     */
    private $dateRetour;


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
     * Set etat
     *
     * @param string $etat
     * @return StatutObjet
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    
        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set dateAquisition
     *
     * @param \DateTime $dateAquisition
     * @return StatutObjet
     */
    public function setDateAquisition($dateAquisition)
    {
        $this->dateAquisition = $dateAquisition;
    
        return $this;
    }

    /**
     * Get dateAquisition
     *
     * @return \DateTime 
     */
    public function getDateAquisition()
    {
        return $this->dateAquisition;
    }

    /**
     * Set dateRetour
     *
     * @param \DateTime $dateRetour
     * @return StatutObjet
     */
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;
    
        return $this;
    }

    /**
     * Get dateRetour
     *
     * @return \DateTime 
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }
}