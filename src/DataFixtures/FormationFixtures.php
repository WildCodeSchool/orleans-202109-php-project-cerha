<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FormationFixtures extends Fixture implements DependentFixtureInterface
{
    public const FORMATIONS = [
        [
            'title' => 'Master commerce international',
            'place' => 'ESI Business School'

        ],

        [
            'title' => 'Licence marketing digital',
            'place' => 'EFAP STRASBOURG'

        ],

        [
            'title' => 'BTS comptabilité et gestion',
            'place' =>  'ESUP Angers'

        ],


    ];
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        foreach (self::FORMATIONS as $key => $formation) {
            $newFormation = new Formation();
            $newFormation->setStartDate($faker->dateTime());
            $newFormation->setEndDate($faker->dateTime());
            $newFormation->setTitle($formation['title']);
            $newFormation->setPlace($formation['place']);
            $newFormation->setDescription($faker->paragraph());
            $newFormation->setReferent($faker->userName());
            $newFormation->setLevel($this->getReference('level_' . ($key)));
            $newFormation->setCandidate($this->getReference('candidate_' . ($key)));
            $manager->persist($newFormation);
        }

        foreach (self::FORMATIONS as $key => $formation) {
            $newFormation = new Formation();
            $newFormation->setStartDate($faker->dateTime());
            $newFormation->setEndDate($faker->dateTime());
            $newFormation->setTitle($formation['title']);
            $newFormation->setPlace($formation['place']);
            $newFormation->setDescription($faker->paragraph());
            $newFormation->setReferent($faker->userName());
            $newFormation->setLevel($this->getReference('level_' . ($key)));
            $newFormation->setCandidat($this->getReference('candidate_sylvain'));
            $manager->persist($newFormation);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CandidateFixtures::class,
            FormationLevelFixtures::class
        ];
    }
}
