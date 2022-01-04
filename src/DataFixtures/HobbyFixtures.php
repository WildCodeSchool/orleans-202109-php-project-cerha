<?php

namespace App\DataFixtures;

use App\Entity\Hobby;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class HobbyFixtures extends Fixture implements DependentFixtureInterface
{
    public const HOBBIES = [
        [
            'name' => 'Equitation',
            'candidat' => 'candidat_1'
        ],
        [
            'name' => 'Danse classique',
            'candidat' => 'candidat_2'
        ],

        [
            'name' => 'Dessin',
            'candidat' => 'candidat_3'
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::HOBBIES as $hobby) {
            $newHobby = new Hobby();
            $newHobby->setName($hobby['name']);
            $newHobby->setCandidat($this->getReference($hobby['candidat']));
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
