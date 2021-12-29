<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Company;
use Faker;

class CompanyFixtures extends Fixture
{
    public const COMPANY_NUMBER = 4;
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < self::COMPANY_NUMBER; $i++) {
            $company = new Company();
            $company->setDenomination($faker->company());
            $company->setSiret($faker->siret());
            $company->setApeCode('7112B');
            $company->setaddress($faker->address);
            $company->setpostalCode($faker->departmentNumber());
            $company->setcity($faker->city);
            $company->setVatNumber('FR65881212070');
            $company->setContactRole($faker->job);
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
