<?php

namespace App\DataFixtures;

use App\Entity\SoftSkill;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SoftSkillFixtures extends Fixture implements DependentFixtureInterface
{
    public const SOFTSKILLS = [

        [
            'name' => 'Management',
            'candidat' => 'candidat_1'
        ],
        [
            'name' => 'Communication',
            'candidat' => 'candidat_2'
        ],

        [
            'name' => 'Adaptabilité',
            'candidat' => 'candidat_3'
        ],

        [
            'name' => 'Travail en équipe',
            'candidat' => 'candidat_4'
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SOFTSKILLS as $skill) {
            $softSkill = new SoftSkill();
            $softSkill->setName($skill['name']);
            $softSkill->setCandidat($this->getReference($skill['candidat']));
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
