<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Company;
use Faker;

class CompanyFixtures extends Fixture
{
    public const COMPANY_NUMBER = 6;
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < self::COMPANY_NUMBER; $i++) {
            $company = new Company();
            $company->setDenomination($faker->company);
            $company->setSiret(preg_replace('/\s+/', '', $faker->siret));
            $company->setApeCode(rand(1001, 9999) . 'B');
            $company->setAddress($faker->streetAddress);
            $company->setPostalCode(preg_replace('/\s+/', '', $faker->postcode));
            $company->setCity($faker->city);
            $company->setVatNumber(preg_replace('/\s+/', '', $faker->vat));
            $company->setContactRole($faker->jobTitle);
            $manager->persist($company);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            Company::class
        ];
    }
}