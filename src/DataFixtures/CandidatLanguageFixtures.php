<?php

namespace App\DataFixtures;

use App\Entity\CandidatLanguage;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CandidatLanguageFixtures extends Fixture implements DependentFixtureInterface
{
    public const LANGUAGES = ['fr_FR', 'de_DE', 'en_EN'];
    public function load(ObjectManager $manager): void
    {
        foreach (self::LANGUAGES as $language) {
            $newLanguage = new CandidatLanguage();
            $newLanguage->setName($language);
            $newLanguage->setCandidat($this->getReference('candidat_john'));
            $manager->persist($newLanguage);
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
