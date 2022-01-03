<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SkillFixtures extends Fixture implements DependentFixtureInterface
{
    public const SKILLS = ['Gestion des comptes', 'Analyse commerciale', 'Ventes et marketing'];
    public function load(ObjectManager $manager): void
    {
        foreach (self::SKILLS as $skillName) {
            $skill = new Skill();
            $skill->setName($skillName);
            $skill->setSector($this->getReference('sector_1'));
            $skill->setCandidat($this->getReference('candidat_john'));
            $manager->persist($skill);
        }
        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            CandidatFixtures::class,
            SectorFixtures::class
        ];
    }
}
