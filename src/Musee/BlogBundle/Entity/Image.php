<?php

namespace Musee\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Image
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Musee\BlogBundle\Entity\ImageRepository")
 * @ORM\HasLifecycleCallbacks
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
     * @var string
     *
     * @ORM\Column(name="URL", type="string", length=255)
	 * @ORM\JoinColumn(nullable=false)
     */
    private $URL;
	
	/**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
	 * @ORM\JoinColumn(nullable=false)
     */
    private $alt;
	
	private $file;
	
	private $tempFilename;

	public function setFile(UploadedFile $file)
	{
		$this -> file = $file;
		
		//vérification de l'existence d'un précédent fichier
		if(null !==  $this-> URL)
		{
			//sauvegarde de l'extension
			$this -> tempFilename = $this -> URL;
			
			$this -> URL = null;
			$this -> alt = null;
		}
	}
	
	/**
	 * @ORM\PrePersist()
	 * @ORM\PreUpdate()
	 */
	public function preUpload()
	{
		if(null === $this ->file)
		{
			return;
		}
		
		//url prend l'extension du fichier (nom complet = id+url)
		$this -> URL = $this -> file -> guessExtension();
		
		$this -> alt = $this -> file -> getClientOriginalName();
	}
	
	/**
	 * @ORM\PostPersist()
	 * @ORM\PostUpdate()
	 */
	public function upload()
	{
		if(null === $this -> file)
		{
			return;
		}
		
		//Si ancien fichier
		if(null !== $this -> tempFilename)
		{
			$oldFile = $this -> getUploadRootDir().'/'.$this -> id.'.'.$this -> tempFilename;
			if(file_exists($oldFile))
			{
				unlink($oldFile);
			}
			
		}
		
		//Déplacement du nouveau fichier
		$this -> file -> move($this -> getUploadRootDir(),
		$this -> id.'.'.$this -> URL);
	}
	
	/**
	 * @ORM\PreRemove()
	 */
	public function preRemoveUpload()
	{
		//sauvegarde du nom en attente de suppression
		$this -> tempFilename = $this -> getUploadRootDir().'/'.$this -> id.'.'.$this -> URL;
	}
	
	/**
	 * @ORM\PostRemove()
	 */
	public function removeUpload()
	{
		if(file_exists($this -> tempFilename))
		{
			unlink($this -> tempFilename);
		}
	}
	
	public function getUploadDir()
	{
		return 'uploads/img';
	}
	
	protected function getUploadRootDir()
	{
		return __DIR__.'/../../../../web/'.$this -> getUploadDir();
	}
	
	public function getWebPath()
	{
		return $this -> getUploadDir().'/'.$this -> getId().'.'.$this -> getURL();
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

    /**
     * Set alt
     *
     * @param string $alt
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
    
        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }
	
	public function getFile()
	{
		return $this->file;
	}
}