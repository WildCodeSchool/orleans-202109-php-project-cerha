<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Experience;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ExperienceFixtures extends Fixture implements DependentFixtureInterface
{
    public const EXPERIENCES = 3;
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < self::EXPERIENCES; $i++) {
            $experience = new Experience();
            $experience->setJobName($faker->jobTitle);
            $experience->setPlace($faker->company);
            $experience->setDescription($faker->paragraph());
            $experience->setReferentName($faker->userName());
            $experience->setCandidat($this->getReference('candidat_' . $i));
            $manager->persist($experience);
            $manager->flush();
        }
    }
    public function getDependencies()
    {
        return [
            CandidatFixtures::class,
        ];
    }
}
