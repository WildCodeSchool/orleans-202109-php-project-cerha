<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Candidate;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTime;

class CandidateFixtures extends Fixture implements DependentFixtureInterface
{
    public const CANDIDATE_NUMBER = 10;
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < self::CANDIDATE_NUMBER; $i++) {
            $candidate = new Candidate();
            $candidate->setbirthDate($faker->dateTime());
            $candidate->setaddress($faker->address);
            $candidate->setpostalCode($faker->departmentNumber());
            $candidate->setcity($faker->city);
            $candidate->setUser($this->getReference('user_' . $i));
            $candidate->addAdditionalDocument($this->getReference('document_0'));
            copy(__DIR__ . '/CV.pdf', __DIR__ . '/../../public/uploads/candidate/CV.pdf');
            $manager->persist($candidate);
            $this->addReference('candidate_' . $i, $candidate);
        }

        $candidate = new Candidate();
        $candidate->setUser($this->getReference('user_candidat'));
        $manager->persist($candidate);
        $this->addReference('candidate_test', $candidate);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            DocumentFixtures::class
        ];
    }
}
