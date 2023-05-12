<?php

namespace App\DataFixtures;

use App\Entity\Player;
use App\Entity\Team;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlayerFixtures extends Fixture implements OrderedFixtureInterface
{
	public function getOrder():array
	{
		return [
			Team::class,
			Nation::class,
		];
	}

    public function load(ObjectManager $manager): void
    {
		for ($i = 0; $i < 20; $i++) { 
			$entity = new Player();
			$entity
				->setFirstname("firstname$i")
				->setLastname("lastname$i")
				->setNumber( random_int(1, 11) )
				->setPortrait("image$i.webp")
				->setBirthday( new DateTime('2000-01-01') )
			;

			// récupération des références de Team créées dans TeamFixtures
			$entity->setTeam(
				$this->getReference("refTeam" . random_int(0, 4))
			);
            
			// récupération des références de Nation créées dans NationFixtures
		//	$entity->setNation(
			//	$this->getReference("refNation")
			//);


			$manager->persist($entity);
		}

        $manager->flush();
    }
}
