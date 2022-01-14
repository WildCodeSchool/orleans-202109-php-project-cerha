<?php

namespace App\DataFixtures;

use App\Entity\Hobby;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class HobbyFixtures extends Fixture implements DependentFixtureInterface
{
    public const HOBBIES = ['Equitation','Danse classique','Dessin'];

    public function load(ObjectManager $manager): void
    {
        foreach (self::HOBBIES as $key => $hobby) {
            $newHobby = new Hobby();
            $newHobby->setName($hobby);
            $newHobby->setCandidat($this->getReference('candidat_' . ($key)));
            $manager->persist($newHobby);
        }

        foreach (self::HOBBIES as $key => $hobby) {
            $newHobby = new Hobby();
            $newHobby->setName($hobby);
            $newHobby->setCandidat($this->getReference('candidat_sylvain'));
            $manager->persist($newHobby);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CandidatFixtures::class
        ];
    }
}
