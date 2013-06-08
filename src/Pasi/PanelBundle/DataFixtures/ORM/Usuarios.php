<?php 

namespace Pasi\PanelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Pasi\PanelBundle\Entity\Usuario;

class Usuarios extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
	public function getOrder()
	{
		return 5;
	}

	private $container;

	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
	}

	public function load(ObjectManager $manager)
	{
		for ($i=1; $i<3; $i++) {
			$usuario = new Usuario();

			$nombre = $this->getUsername();
			
			$usuario->setUsername($nombre);
			
			$usuario->setEmail($nombre.$i.'@ithri.net');
			$usuario->setPassword(md5($nombre));
			
			
			$manager->persist($usuario);
		}

		$manager->flush();
	}

	
	private function getUsername(){
		$username = array(
				'admin', 'ithri', 'pasi'
		);
	
		return $username[array_rand($username)];
	}


}