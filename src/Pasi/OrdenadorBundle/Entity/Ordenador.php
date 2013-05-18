<?php

namespace Pasi\OrdenadorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ordenador
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pasi\OrdenadorBundle\Entity\OrdenadorRepository")
 */
class Ordenador
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
     * @ORM\Column(name="ram", type="string", length=100)
     */
    private $ram;

    /**
     * @var string
     *
     * @ORM\Column(name="disco", type="string", length=100)
     */
    private $disco;

    /**
     * @var string
     *
     * @ORM\Column(name="cpu", type="string", length=100)
     */
    private $cpu;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Pasi\EmpleadoBundle\Entity\Empleado", inversedBy="ordenadores")
     */
    private $empleado;

    /**
     * _ToString metod
     */
    public function __toString(){
    	return 'Pc_'.$this->getNombre();
    }
    public function getAlias(){
    	return 'Pc_'.$this->getNombre();
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
     * @return Ordenador
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
     * Set ram
     *
     * @param string $ram
     * @return Ordenador
     */
    public function setRam($ram)
    {
        $this->ram = $ram;
    
        return $this;
    }

    /**
     * Get ram
     *
     * @return string 
     */
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Set disco
     *
     * @param string $disco
     * @return Ordenador
     */
    public function setDisco($disco)
    {
        $this->disco = $disco;
    
        return $this;
    }

    /**
     * Get disco
     *
     * @return string 
     */
    public function getDisco()
    {
        return $this->disco;
    }

    /**
     * Set cpu
     *
     * @param string $cpu
     * @return Ordenador
     */
    public function setCpu($cpu)
    {
        $this->cpu = $cpu;
    
        return $this;
    }

    /**
     * Get cpu
     *
     * @return string 
     */
    public function getCpu()
    {
        return $this->cpu;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Ordenador
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set empleado
     *
     * @param \Pasi\EmpleadoBundle\Entity\Empleado $empleado
     * @return Ordenador
     */
    public function setEmpleado(\Pasi\EmpleadoBundle\Entity\Empleado $empleado)
    {
        $this->empleado = $empleado;
    
        return $this;
    }

    /**
     * Get empleado
     *
     * @return \Pasi\EmpleadoBundle\Entity\Empleado 
     */
    public function getEmpleado()
    {
        return $this->empleado;
    }
}