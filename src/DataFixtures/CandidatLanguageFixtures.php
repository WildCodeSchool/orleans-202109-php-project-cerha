<?php

namespace App\DataFixtures;

use App\Entity\CandidatLanguage;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CandidatLanguageFixtures extends Fixture implements DependentFixtureInterface
{
    public const LANGUAGES = [
        'br_FR', 'fr_FR', 'de_DE', 'chr_US', 'el_CY', 'en_BI', 'es_PR', 'fi_FI', 'fy_NL',
        'gsw_CH', 'id_ID', 'ka_GE', 'ko_KP', 'lt_LT', 'mk_MK', 'nb_NO', 'pl_PL', 'ru_BY'
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::LANGUAGES as $language) {
            $newLanguage = new CandidatLanguage();
            $newLanguage->setName($language);
            $newLanguage
                ->setCandidat(
                    $this->getReference(
                        'candidat_' . rand(0, (CandidatFixtures::CANDIDAT_NUMBER) - 1)
                    )
                );
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