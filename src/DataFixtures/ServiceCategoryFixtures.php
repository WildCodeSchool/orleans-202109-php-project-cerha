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
            'type' => 'candidate'
        ],
        [
            'title' => 'Prestations de services',
            'type' => 'candidate'
        ],
        [
            'title' => 'Conseils & Expertise RH',
            'type' => 'company'
        ],
        [
            'title' => 'Appui administratif',
            'type' => 'company'
        ],
        [
            'title' => 'Cabinet recrutement',
            'type' => 'company'
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
