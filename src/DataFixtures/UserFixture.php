<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 30; $i++) {
            $user = new User("user-firstname-" . $i, "user-lastname-" . $i);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
