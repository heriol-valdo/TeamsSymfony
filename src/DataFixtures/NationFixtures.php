<?php

namespace App\DataFixtures;

use App\Entity\Nation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NationFixtures extends Fixture 
{
	
    public function load(ObjectManager $manager): void
    {
		for ($i = 0; $i < 5; $i++) { 
			$entity = new Nation();
			$entity
				->setName("name$i")
				->setImage("image$i.webp");

			// mise en mémoire de l'entité pour y accéder dans PlayerFixtures
		//	$this->addReference("refNation$i", $entity);
			

			$manager->persist($entity);
		}

        $manager->flush();
    }
}
