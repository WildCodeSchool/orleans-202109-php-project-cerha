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
            $formation->setStartDate($faker->dateTime());
            $formation->setEndDate($faker->dateTime());
            $formation->setTitle('Master commerce international');
            $formation->setPlace('ESI Business School');
            $formation->setDescription($faker->paragraph());
            $formation->setReferent($faker->userName());
            $formation->setLevel($this->getReference('level_2'));
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
