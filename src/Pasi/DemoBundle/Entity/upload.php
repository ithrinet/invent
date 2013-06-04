<?php

namespace Pasi\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * upload
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class upload
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
     * @var array
     *
     * @ORM\Column(name="fotos", type="array")
     */
    private $fotos;


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
     * Set fotos
     *
     * @param array $fotos
     * @return upload
     */
    public function setFotos($fotos)
    {
        $this->fotos = $fotos;
    
        return $this;
    }

    /**
     * Get fotos
     *
     * @return array 
     */
    public function getFotos()
    {
        return $this->fotos;
    }
}
