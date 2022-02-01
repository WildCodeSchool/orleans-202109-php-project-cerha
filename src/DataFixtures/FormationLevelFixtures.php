<?php

namespace App\DataFixtures;

use App\Entity\FormationLevel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FormationLevelFixtures extends Fixture
{
    public const FORMATIONS_LEVELS = ['Baccalauréat', 'BTS', 'Master'];
    public function load(ObjectManager $manager): void
    {
        foreach (self::FORMATIONS_LEVELS as $key => $data) {
            $level = new FormationLevel();
            $level->setLevel($data);
            $manager->persist($level);
            $this->addReference('level_' . $key, $level);
        }
        $manager->flush();
    }
}
