<?php

namespace App\DataFixtures;

use App\Entity\SoftSkill;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SoftSkillFixtures extends Fixture implements DependentFixtureInterface
{
    public const SOFTSKILLS = ['Management', 'Communication', 'Adaptabilité', 'Travail en équipe'];
    public function load(ObjectManager $manager): void
    {
        foreach (self::SOFTSKILLS as $skill) {
            $softSkill = new SoftSkill();
            $softSkill->setName($skill);
            $softSkill->setCandidat($this->getReference('candidat_john'));
            $manager->persist($softSkill);
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