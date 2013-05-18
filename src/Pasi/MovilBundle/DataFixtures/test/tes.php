<?php 
namespace Pasi\MovilBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Pasi\MovilBundle\Entity\Movil;

class Moviles implements FixtureInterface
{
	
	public function load(ObjectManager $manager) 
	{
		$moviles = array(
				array('modelo'=>'NoKia n80','numero'=>'067521365'),
				array('modelo'=>'NoKia n90','numero'=>'067521365'),
				array('modelo'=>'NoKia n70','numero'=>'067521365'),
				array('modelo'=>'NoKia n9','numero'=>'067521365'),
				array('modelo'=>'NoKia n8','numero'=>'067521365'),
				array('modelo'=>'NoKia n7','numero'=>'067521365'),
				array('modelo'=>'NoKia n6','numero'=>'067521365'),
				array('modelo'=>'NoKia n5','numero'=>'067521365'),
				array('modelo'=>'NoKia n4','numero'=>'067521365'),
				array('modelo'=>'NoKia n2','numero'=>'067521365'),
				array('modelo'=>'NoKia n3','numero'=>'067521365'),
				array('modelo'=>'NoKia n1','numero'=>'067521365'),
				array('modelo'=>'NoKia n80','numero'=>'067521365'),
				array('modelo'=>'NoKia n90','numero'=>'067521365'),
				array('modelo'=>'NoKia n70','numero'=>'067521365'),
				array('modelo'=>'NoKia n90','numero'=>'067521365'),
				array('modelo'=>'NoKia n82','numero'=>'067521365'),
				array('modelo'=>'NoKia n700','numero'=>'067521365'),
				array('modelo'=>'NoKia n60','numero'=>'067521365'),
				array('modelo'=>'NoKia n50','numero'=>'067521365'),
				array('modelo'=>'NoKia n40','numero'=>'067521365'),
				array('modelo'=>'NoKia n20','numero'=>'067521365'),
				array('modelo'=>'NoKia n30','numero'=>'067521365'),
				array('modelo'=>'NoKia n100','numero'=>'067521365'),
		);
		
		foreach ($moviles as $movil){
			$item = new Movil();
			$item->setModelo($movil['modelo']);
			$item->setNumero($movil['numero']);
			$manager->persist($item);			
		}
		$manager->flush();
	}
}
