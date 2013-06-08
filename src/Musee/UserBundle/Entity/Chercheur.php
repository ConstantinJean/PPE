<?php

namespace Musee\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Musee\UserBundle\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Chercheur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Musee\UserBundle\Entity\ChercheurRepository")
 */
class Chercheur implements UserInterface
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
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    protected $username;
	
	/**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean", nullable=true)
     */
    private $isActive;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="confirmationToken", type="string", length=255, nullable=true)
	 */
	protected $confirmationToken;
	
	/**
     * @var string
     *
     * @ORM\Column(name="NomThese", type="string", length=255)
     */
    private $NomThese;

    /**
     * @var string
     *
     * @ORM\Column(name="DomaineRecherche", type="string", length=255)
     */
    private $DomaineRecherche;
	
	public function __construct()
    {
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->isActive = false;
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
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
	
	/**
	 * Get username
	 *
	 * @return string
	 */
	public function getUsername()
	{
		return $this->email;
	}

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
	
	
	public function eraseCredentials()
    {
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }
	
	



    /**
     * Set NomThese
     *
     * @param string $nomThese
     * @return Chercheur
     */
    public function setNomThese($nomThese)
    {
        $this->NomThese = $nomThese;
    
        return $this;
    }

    /**
     * Get NomThese
     *
     * @return string 
     */
    public function getNomThese()
    {
        return $this->NomThese;
    }

    /**
     * Set DomaineRecherche
     *
     * @param string $domaineRecherche
     * @return Chercheur
     */
    public function setDomaineRecherche($domaineRecherche)
    {
        $this->DomaineRecherche = $domaineRecherche;
    
        return $this;
    }

    /**
     * Get DomaineRecherche
     *
     * @return string 
     */
    public function getDomaineRecherche()
    {
        return $this->DomaineRecherche;
    }
	
	public function getRoles()
    {
        return array('ROLE_CHERCHEUR');
    }
	
	

    /**
     * Set confirmationToken
     *
     * @param string $confirmationToken
     * @return Chercheur
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;
    
        return $this;
    }

    /**
     * Get confirmationToken
     *
     * @return string 
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }
}