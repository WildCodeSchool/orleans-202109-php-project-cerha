<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ServiceCategory;

class ServiceCategoryFixtures extends Fixture
{
    public const CATEGORIES = [
        [
            'title' => 'Coaching personnalisé',
            'type' => 'Candidat'
        ],
        [
            'title' => 'Prestations de services',
            'type' => 'Candidat'
        ],
        [
            'title' => 'Conseils & Expertise RH',
            'type' => 'Entreprise'
        ],
        [
            'title' => 'Appui administratif',
            'type' => 'Entreprise'
        ],
        [
            'title' => 'Cabinet recrutement',
            'type' => 'Entreprise'
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $key => $categoryInfos) {
            $category = new ServiceCategory();
            $category->setTitle($categoryInfos['title']);
            $category->setType($categoryInfos['type']);
            $manager->persist($category);
            $this->addReference('category_' . $key, $category);
        }
        $manager->flush();
    }
}
