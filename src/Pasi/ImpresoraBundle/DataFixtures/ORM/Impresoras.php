<?php 

namespace Pasi\ImpresoraBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Pasi\ImpresoraBundle\Entity\Imresora;
use Pasi\EmpleadoBundle\Entity\Empleado;
use Pasi\ImpresoraBundle\Entity\Impresora;

/**
 * Fixtures de la entidad Usuario.
 * Crea 500 usuarios de prueba con información muy realista.
 */
class Impresoras extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
	public function getOrder()
	{
		return 2;
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
			$impresora = new Impresora();

			$impresora->setNombre($this->getNombre());
			$impresora->setMarca($this->getMarca());
			$impresora->setModelo($this->getModelo());
			$impresora->setTipo($this->getTipo());
			
			$empleado = $empleados[array_rand($empleados)];
			$impresora->setEmpleado($empleado);
			
			$manager->persist($impresora);
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
				'Recepcion', 'HHMM', 'Desarrollo', 'Admin', 'López', 'Casa',
				'Trabajo'
		);
	
		return $nombres[array_rand($nombres)];
	}
	
	/**
	 * Generador aleatorio de Marcas de Imresoras.
	 *
	 * @return string Marca aleatorio generado para la Impresora.
	 */
	private function getMarca()
	{
		$Marcas = array(
				'Lg', 'Hp', 'Samsung', 'Dell', 'Acer', 'Epson',
				'Canon'
		);
	
		return $Marcas[array_rand($Marcas)];
	}
	
	/**
	 * Generador aleatorio de Marcas de Imresoras.
	 *
	 * @return string Marca aleatorio generado para la Impresora.
	 */
	private function getTipo()
	{
		$tipos = array(
				'Tinta', 'Laser'
		);
	
		return $tipos[array_rand($tipos)];
	}
	
	/**
	 * Generador aleatorio de Modelos 
	 *
	 * @return string Modelo aleatorio generado por el imresoras.
	 */
	private function getModelo()
	{
		$modelos = array(
				'MS', 'N', 'ML', 'Glaxy', 'Lk',
				'Ko', 'Mo', 'DF', 'POL', 'XD',
				'SW', 'Fd', 'Df', 'PS', 'GD', 'Mn'
		);

		return $modelos[array_rand($modelos)].'-'.rand(100, 999);
	}

	/**
	 * Generador aleatorio de Numeros
	 *
	 * @return string Numero aleatorio generado para Movil.
	 */
	private function getNumero()
	{
		$prefijo = array('061', '052', '062','052', '063', '053');
		return $prefijo[array_rand($prefijo)].sprintf('%02s%03s', rand(0, 9), rand(0, 99999));
	}
}