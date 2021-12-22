<?php

namespace App\DataFixtures;

use App\Entity\Hobby;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HobbyFixtures extends Fixture
{
    public const HOBBIES = ['Equitation', 'Dessin', 'Danse classique'];
    public function load(ObjectManager $manager): void
    {
        foreach (self::HOBBIES as $hobby) {
            $newHobby = new Hobby();
            $newHobby->setName($hobby);
            $manager->persist($newHobby);
        }
        $manager->flush();
    }
}
