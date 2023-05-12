<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
		// création d'un utilisateur ayant le rôle ROLE_USER
		$user = new User();
		$user->setEmail('user@user.com');
		$user->setPassword('$2y$13$oNvpm61DDZXVIqUXpf/Z4Onu4zA.EngvB6P4T.y1xnuEn4QRQhvdS');
		$user->setRoles(['ROLE_USER']);
        $manager->persist($user);

		// création d'un utilisateur ayant le rôle ROLE_ADMIN
		$admin = new User();
		$admin->setEmail('admin@admin.com');
		$admin->setPassword('$2y$13$RMYPNYm4P5i9UF/TVPOTfelXHfE6vpCqycklAH/cpyR.bfmnPi7rO');
		$admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $manager->flush();
    }
}
