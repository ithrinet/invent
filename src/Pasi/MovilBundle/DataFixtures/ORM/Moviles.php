<?php 

namespace Pasi\MovilBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Pasi\MovilBundle\Entity\Movil;
use Pasi\EmpleadoBundle\Entity\Empleado;

/**
 * Fixtures de la entidad Usuario.
 * Crea 500 usuarios de prueba con información muy realista.
 */
class Moviles extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
	public function getOrder()
	{
		return 40;
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
			$movil = new Movil();

			$movil->setModelo($this->getModelo());
			$movil->setNumero($this->getNumero());
			$empleado = $empleados[array_rand($empleados)];
			$movil->setEmpleado($empleado);
			
			$manager->persist($movil);
		}

		$manager->flush();
	}
	
	/**
	 * Generador aleatorio de Modelos 
	 *
	 * @return string Modelo aleatorio generado por el Movil.
	 */
	private function getModelo()
	{
		$marca = array('Lg', 'Samsung', 'Iphon','Sony', 'HTC', 'Nokia');
		$serie = array(
				'MS', 'N', 'C', 'Glaxy', 'Lk',
				'Ko', 'Mo', 'DF', 'Po', 'XD',
				'SW', 'Fd', 'Df', 'PS', 'GD', 'Mn'
		);

		return $marca[array_rand($marca)].' '.$serie[array_rand($serie)].' '.rand(1, 100);
	}

	/**
	 * Generador aleatorio de Numeros
	 *
	 * @return string Numero aleatorio generado para Movil.
	 */
	private function getNumero()
	{
		$prefijo = array('061', '052', '062','052', '063', '053');
		
		return $prefijo[array_rand($prefijo)].sprintf('%06s', rand(0, 9999999));
	}
}