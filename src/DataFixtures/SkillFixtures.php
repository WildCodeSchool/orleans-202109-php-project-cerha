<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SkillFixtures extends Fixture implements DependentFixtureInterface
{
    public const SKILLS =
    [ 'Gestion des comptes','Analyse commerciale','Ventes et marketing'];


    public function load(ObjectManager $manager): void
    {
        foreach (self::SKILLS as $key => $skillName) {
            $skill = new Skill();
            $skill->setName($skillName);
            $skill->setSector($this->getReference('sector_' . ($key)));
            $skill->setCandidate($this->getReference('candidate_' . ($key)));
            $manager->persist($skill);
        }

        foreach (self::SKILLS as $key => $skillName) {
            $skill = new Skill();
            $skill->setName($skillName);
            $skill->setSector($this->getReference('sector_' . ($key)));
            $skill->setCandidat($this->getReference('candidate_sylvain'));
            $manager->persist($skill);
        }

        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            CandidateFixtures::class,
            SectorFixtures::class
        ];
    }
}
