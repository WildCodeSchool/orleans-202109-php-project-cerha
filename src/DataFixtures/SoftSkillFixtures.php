<?php

namespace App\DataFixtures;

use App\Entity\SoftSkill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SoftSkillFixtures extends Fixture
{
    public const SOFTSKILLS = ['Management', 'Communication', 'Adaptabilité', 'Travail en équipe'];
    public function load(ObjectManager $manager): void
    {
        foreach (self::SOFTSKILLS as $skill) {
            $softSkill = new SoftSkill();
            $softSkill->setName($skill);
            $manager->persist($softSkill);
        }
        $manager->flush();
    }
}
