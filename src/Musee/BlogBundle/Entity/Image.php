<?php

namespace Musee\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Musee\BlogBundle\Entity\ImageRepository")
 */
class Image
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
     * @ORM\Column(name="Id", type="integer")
     */
    private $Id;

    /**
     * @var string
     *
     * @ORM\Column(name="URL", type="string", length=255)
     */
    private $URL;


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
     * Set Id
     *
     * @param integer $id
     * @return Image
     */
    public function setId($id)
    {
        $this->Id = $id;
    
        return $this;
    }

    /**
     * Set URL
     *
     * @param string $uRL
     * @return Image
     */
    public function setURL($uRL)
    {
        $this->URL = $uRL;
    
        return $this;
    }

    /**
     * Get URL
     *
     * @return string 
     */
    public function getURL()
    {
        return $this->URL;
    }
}
