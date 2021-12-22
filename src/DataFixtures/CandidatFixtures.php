<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Candidat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CandidatFixtures extends Fixture
{
    public const CANDIDAT_NUMBER = 4;
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < self::CANDIDAT_NUMBER; $i++) {
            $candidat = new Candidat();
            $candidat->setbirthDate($faker->dateTime());
            $candidat->setaddress($faker->address);
            $candidat->setpostalCode($faker->departmentNumber());
            $candidat->setcity($faker->city);
            $manager->persist($candidat);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            Candidat::class
        ];
    }
}
