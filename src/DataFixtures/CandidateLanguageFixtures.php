<?php

namespace App\DataFixtures;

use App\Entity\CandidateLanguage;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CandidateLanguageFixtures extends Fixture implements DependentFixtureInterface
{
    public const LANGUAGES = [
        'br_FR', 'fr_FR', 'de_DE', 'chr_US', 'el_CY', 'en_BI', 'es_PR', 'fi_FI', 'fy_NL',
        'gsw_CH', 'id_ID', 'ka_GE', 'ko_KP', 'lt_LT', 'mk_MK', 'nb_NO', 'pl_PL', 'ru_BY'
    ];

    public const LANGUAGES_NUMBER = 5;
    public function load(ObjectManager $manager): void
    {
        foreach (self::LANGUAGES as $language) {
            $newLanguage = new CandidateLanguage();
            $newLanguage->setName($language);
            $newLanguage
                ->setCandidate(
                    $this->getReference(
                        'candidate_' . rand(0, (CandidateFixtures::CANDIDATE_NUMBER) - 1)
                    )
                );
            $manager->persist($newLanguage);
        }

        for ($i = 0; $i < self::LANGUAGES_NUMBER; $i++) {
            $language = new CandidatLanguage();
            $language->setName(self::LANGUAGES[array_rand(self::LANGUAGES)]);
            $language->setCandidat($this->getReference('candidate_sylvain'));
            $manager->persist($language);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CandidateFixtures::class
        ];
    }
}
