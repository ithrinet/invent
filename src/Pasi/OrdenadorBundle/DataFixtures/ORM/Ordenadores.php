<?php 

namespace Pasi\OrdenadorBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Pasi\OrdenadorBundle\Entity\Ordenador;
use Pasi\EmpleadoBundle\Entity\Empleado;;

/**
 * Fixtures de la entidad Usuario.
 * Crea 500 usuarios de prueba con información muy realista.
 */
class Ordenadores extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
	public function getOrder()
	{
		return 4;
	}

	private $container;

	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
	}

	public function load(ObjectManager $manager)
	{
		// Obtener todos los empleados de la base de datos
        $empleados = $manager->getRepository('EmpleadoBundle:Empleado')->findAll();
	
		for ($i=1; $i<=20; $i++) {
			
			$ordenador = new Ordenador();
			$nombre = $this->getNombre().$i;
			$ordenador->setNombre($nombre);
			$ordenador->setDisco(rand(100, 900).' GB');
			$ordenador->setRam(rand(1, 10).' GB');
			$ordenador->setCpu($this->getCpu());
			$ordenador->setDescripcion('Hola este Ordenador es  '.$nombre);
			
			$empleado = $empleados[array_rand($empleados)];
			$ordenador->setEmpleado($empleado);
			
			$manager->persist($ordenador);
		}

		$manager->flush();
	}
	
	/**
	 * Generador aleatorio de Nombres de Imresoras.
	 *
	 * @return string Nombres aleatorio generado para la Imresora.
	 */
	private function getNombre()
	{
		$nombres = array(
				'Desktop', 'Laptop', 'Server', 'Tableta', 'Mini'
		);
	
		return $nombres[array_rand($nombres)];
	}

	/**
	 * Generador aleatorio de Modelos 
	 *
	 * @return string Modelo aleatorio generado por el imresoras.
	 */
	private function getCpu()
	{
		$cpus = array(
				'E5200', 'E530', 'ML', 'Glaxy', 'Lk',
				'Ko', 'Mo', 'DF', 'POL', 'XD',
				'SW', 'Fd', 'Df', 'PS', 'GD', 'Mn'
		);

		return $cpus[array_rand($cpus)].' '.rand(1, 3).','.rand(10, 90).' GHz';
	}

}