<?php

namespace Musee\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfoSupplementaire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Musee\UserBundle\Entity\InfoSupplementaireRepository")
 */
class InfoSupplementaire
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
     * @var integer
     *
     * @ORM\Column(name="DureeAnciennete", type="integer")
     */
    private $DureeAnciennete;

    /**
     * @var string
     *
     * @ORM\Column(name="Photo", type="string", length=255)
     */
    private $Photo;

    /**
     * @var string
     *
     * @ORM\Column(name="NomDeLaThese", type="string", length=255)
     */
    private $NomDeLaThese;

    /**
     * @var string
     *
     * @ORM\Column(name="DescriptionThese", type="text")
     */
    private $DescriptionThese;


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
     * Set DureeAnciennete
     *
     * @param integer $dureeAnciennete
     * @return InfoSupplementaire
     */
    public function setDureeAnciennete($dureeAnciennete)
    {
        $this->DureeAnciennete = $dureeAnciennete;
    
        return $this;
    }

    /**
     * Get DureeAnciennete
     *
     * @return integer 
     */
    public function getDureeAnciennete()
    {
        return $this->DureeAnciennete;
    }

    /**
     * Set Photo
     *
     * @param string $photo
     * @return InfoSupplementaire
     */
    public function setPhoto($photo)
    {
        $this->Photo = $photo;
    
        return $this;
    }

    /**
     * Get Photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->Photo;
    }

    /**
     * Set NomDeLaThese
     *
     * @param string $nomDeLaThese
     * @return InfoSupplementaire
     */
    public function setNomDeLaThese($nomDeLaThese)
    {
        $this->NomDeLaThese = $nomDeLaThese;
    
        return $this;
    }

    /**
     * Get NomDeLaThese
     *
     * @return string 
     */
    public function getNomDeLaThese()
    {
        return $this->NomDeLaThese;
    }

    /**
     * Set DescriptionThese
     *
     * @param string $descriptionThese
     * @return InfoSupplementaire
     */
    public function setDescriptionThese($descriptionThese)
    {
        $this->DescriptionThese = $descriptionThese;
    
        return $this;
    }

    /**
     * Get DescriptionThese
     *
     * @return string 
     */
    public function getDescriptionThese()
    {
        return $this->DescriptionThese;
    }
}
