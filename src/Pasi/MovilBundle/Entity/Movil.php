<?php

namespace Pasi\MovilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Movil
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Movil
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
     * @ORM\Column(name="modelo", type="string", length=100)
     */
    private $modelo;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer")
     * @Assert\NotBlank(message = "Debes ingresar un neumero de telefon valido.. 9 numeros")
     * @Assert\Regex(
     *     pattern="/[0-9]{9}/",
     *     message="Debes ingresar un neumero de telefon valido.. 9 numeros"
     * )
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Pasi\EmpleadoBundle\Entity\Empleado", inversedBy="moviles", cascade="all")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $empleado;

    /**
     * _ToString metod
     */
    public function __toString(){
    	return $this->getModelo();
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
     * Set modelo
     *
     * @param string $modelo
     * @return Movil
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    
        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return Movil
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set empleado
     *
     * @param \Pasi\EmpleadoBundle\Entity\Empleado $empleado
     * @return Movil
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