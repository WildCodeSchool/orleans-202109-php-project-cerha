<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FormationFixtures extends Fixture implements DependentFixtureInterface
{
    public const FORMATIONS = 2;
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < self::FORMATIONS; $i++) {
            $formation = new Formation();
            $formation->setstartDate($faker->dateTime());
            $formation->setendDate($faker->dateTime());
            $formation->settitle('Master commerce international');
            $formation->setplace('ESI Business School');
            $formation->setdescription($faker->paragraph());
            $formation->setreferent($faker->userName());
            $formation->setlevel($this->getReference('level_2'));
            $formation->setCandidat($this->getReference('candidat_john'));
            $manager->persist($formation);
            $manager->flush();
        }
    }
    public function getDependencies()
    {
        return [
            CandidatFixtures::class,
            FormationLevelFixtures::class
        ];
    }
}
