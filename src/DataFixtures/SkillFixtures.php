<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SkillFixtures extends Fixture implements DependentFixtureInterface
{
    public const SKILLS =
    [
        [
            'name' => 'Gestion des comptes',
            'candidat' => 'candidat_1',
            'sector' => 'sector_0'
        ],
        [
            'name' => 'Analyse commerciale',
            'candidat' => 'candidat_2',
            'sector' => 'sector_1'
        ],

        [
            'name' => 'Ventes et marketing',
            'candidat' => 'candidat_3',
            'sector' => 'sector_2'
        ]
    ];


    public function load(ObjectManager $manager): void
    {
        foreach (self::SKILLS as $skillName) {
            $skill = new Skill();
            $skill->setName($skillName['name']);
            $skill->setSector($this->getReference($skillName['sector']));
            $skill->setCandidat($this->getReference($skillName['candidat']));
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
