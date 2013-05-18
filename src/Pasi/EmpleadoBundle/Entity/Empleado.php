<?php

namespace Pasi\EmpleadoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Pasi\OrdenadoraBundle\Entity\Ordenador;
use Pasi\ImpresoraBundle\Entity\Impresora;
use Pasi\MovilBundle\Entity\Movil;

/**
 * Empleado
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Empleado
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
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=100)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=100)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=100)
     */
    private $direccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaNacimiento", type="date")
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Pasi\ImpresoraBundle\Entity\Impresora", mappedBy="empleado")
     */
    private $impresoras;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Pasi\OrdenadorBundle\Entity\Ordenador", mappedBy="empleado")
     */
    private $ordenadores;

    /**
     * @var Movil
     *
     * @ORM\OneToMany(targetEntity="Pasi\MovilBundle\Entity\Movil", mappedBy="empleado")
     */
    private $moviles;
    /**
     * To _String
     */
    public function __toString()
    {
    	return $this->getNombre().' '.$this->getApellidos();
    }
    /**
     * get Nombre Completo
     */
    public function getNombreCompleto(){
    	return $this->getNombre().' '.$this->getApellidos();
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->impresoras = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ordenadores = new \Doctrine\Common\Collections\ArrayCollection();
        $this->moviles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Set Ordenadores
     *
     * @param string $impresoras
     * @return Empleado
     */
    public function setOrdenadores(\Doctrine\Common\Collections\ArrayCollection $ordenadores = null)
    {
    	$this->ordenadores = $ordenadores;
    
    	return $this;
    }
    /**
     * Set Moviles
     *
     * @param string $impresoras
     * @return Empleado
     */
    public function setMoviles(\Doctrine\Common\Collections\ArrayCollection $moviles= null)
    {
    	$this->moviles = $moviles;
    
    	return $this;
    }
    /**
     * Set Impresoras
     *
     * @param string $impresoras
     * @return Empleado
     */
    public function setImpresoras(\Pasi\ImpresoraBundle\Entity\Impresora $impresoras= null)
    {
    	$this->impresoras = $impresoras;
    
    	return $this;
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
     * Set nombre
     *
     * @param string $nombre
     * @return Empleado
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Empleado
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Empleado
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    
        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Empleado
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return Empleado
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    
        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Add impresoras
     *
     * @param \Pasi\ImpresoraBundle\Entity\Impresora $impresoras
     * @return Empleado
     */
    public function addImpresora(\Pasi\ImpresoraBundle\Entity\Impresora $impresoras)
    {
        $this->impresoras[] = $impresoras;
    
        return $this;
    }

    /**
     * Remove impresoras
     *
     * @param \Pasi\ImpresoraBundle\Entity\Impresora $impresoras
     */
    public function removeImpresora(\Pasi\ImpresoraBundle\Entity\Impresora $impresoras)
    {
        $this->impresoras->removeElement($impresoras);
    }

    /**
     * Get impresoras
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImpresoras()
    {
        return $this->impresoras;
    }

    /**
     * Add ordenadores
     *
     * @param \Pasi\OrdenadorBundle\Entity\Ordenador $ordenadores
     * @return Empleado
     */
    public function addOrdenadore(\Pasi\OrdenadorBundle\Entity\Ordenador $ordenadores)
    {
        $this->ordenadores[] = $ordenadores;
    
        return $this;
    }

    /**
     * Remove ordenadores
     *
     * @param \Pasi\OrdenadorBundle\Entity\Ordenador $ordenadores
     */
    public function removeOrdenadore(\Pasi\OrdenadorBundle\Entity\Ordenador $ordenadores)
    {
        $this->ordenadores->removeElement($ordenadores);
    }

    /**
     * Get ordenadores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrdenadores()
    {
        return $this->ordenadores;
    }

    /**
     * Add moviles
     *
     * @param \Pasi\MovilBundle\Entity\Movil $moviles
     * @return Empleado
     */
    public function addMovile(\Pasi\MovilBundle\Entity\Movil $moviles)
    {
        $this->moviles[] = $moviles;
    
        return $this;
    }

    /**
     * Remove moviles
     *
     * @param \Pasi\MovilBundle\Entity\Movil $moviles
     */
    public function removeMovile(\Pasi\MovilBundle\Entity\Movil $moviles)
    {
        $this->moviles->removeElement($moviles);
    }

    /**
     * Get moviles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMoviles()
    {
        return $this->moviles;
    }
}