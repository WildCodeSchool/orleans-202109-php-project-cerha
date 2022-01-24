<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ServiceFixtures extends Fixture implements DependentFixtureInterface
{
    public const SERVICE_NUMBER = 20;
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 10; $i < (self::SERVICE_NUMBER + 10); $i++) {
            $service = new Service();
            $service->setTitle($faker->words(2, true));
            $service->setDescription($faker->paragraph(5));
            $service->setCategory($this->getReference('category_' . rand(0, 4)));
            $manager->persist($service);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ServiceCategoryFixtures::class
        ];
    }
}
