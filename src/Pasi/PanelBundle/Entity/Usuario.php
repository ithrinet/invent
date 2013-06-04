<?php

namespace Pasi\PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity
 * @author Administrador
 *
 */
class Usuario implements UserInterface, \Serializable {
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	/**
	 * @ORM\Column(type="string")
	 */
	private $email;
	/**
	 * @ORM\Column(type="string")
	 */
	private $password;
	/**
	 * @ORM\Column(type="string")
	 */
	private $username;
	
	public function getRoles() {
		return array('ROLE_ADMIN');

	}
	public function getPassword() {
		return $this->password;

	}
	public function getSalt(){
		return null;

	}
	public function getUsername() {
		return $this->username;

	}
	public function eraseCredentials() {
		return null;

	}
	
	/**
	 * 
	 */
	public function serialize() {
		return serialize(array($this->id));
	}
	
	/**
	 * @param unknown $serialized
	 */
	public function unserialize($serialized) {
		list($this->id) = unserialize($serialized);

	}

	
	public function __toString(){
		return $this->username;
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
     * @return Usuario
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
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Usuario
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }
}