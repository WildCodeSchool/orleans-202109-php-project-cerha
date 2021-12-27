<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Candidat;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CandidatFixtures extends Fixture implements DependentFixtureInterface
{
    public const CANDIDAT_NUMBER = 10;
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < self::CANDIDAT_NUMBER; $i++) {
            $candidat = new Candidat();
            $candidat->setbirthDate($faker->dateTime());
            $candidat->setaddress($faker->address);
            $candidat->setpostalCode($faker->departmentNumber());
            $candidat->setcity($faker->city);
            $candidat->setUser($this->getReference('user_' . $i));
            $manager->persist($candidat);
            $this->addReference('candidat_' . $i, $candidat);
        }

        $candidat = new Candidat();
        $birthDate = new \DateTime('12/02/1992');
        $candidat->setbirthDate($birthDate);
        $candidat->setaddress('2 rue de la Chèvre qui danse');
        $candidat->setpostalCode(45000);
        $candidat->setcity('Orléans');
        $candidat->setUser($this->getReference('user_john'));
        $manager->persist($candidat);
        $this->addReference('candidat_john', $candidat);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
}
