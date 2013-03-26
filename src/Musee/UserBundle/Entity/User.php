<?php

namespace Musee\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Musee\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;
	
	/**
	* @var string
	*
    * @ORM\Column(name="name", type="string", length=255)
	* @ORM\JoinColumn(nullable=false)
    */
	private $name;
	
	/**
	* @var string
	*
    * @ORM\Column(name="firstName", type="string", length=255)
	* @ORM\JoinColumn(nullable=false)
    */
	private $firstName;
	
	public function setEmail($email)
	{
         parent::setEmail($email);
         $this->setUsername($email);
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
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
}