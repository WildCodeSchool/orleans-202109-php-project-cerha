<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Company;
use Faker;

class CompanyFixtures extends Fixture
{
    public const COMPANY_NUMBER = 5;
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 5; $i < (self::COMPANY_NUMBER + 5); $i++) {
            $company = new Company();
            $company->setDenomination($faker->company);
            $company->setSiret(preg_replace('/\s+/', '', $faker->siret));
            $company->setApeCode(rand(1001, 9999) . 'B');
            $company->setAddress($faker->streetAddress);
            $company->setCompanyNumber((int)$faker->serviceNumber());
            $company->setPostalCode(preg_replace('/\s+/', '', $faker->postcode));
            $company->setCity($faker->city);
            $company->setVatNumber(preg_replace('/\s+/', '', $faker->vat));
            $company->setContactRole($faker->jobTitle);
            $company->setWebsite('http://www.lesite.fr');
            $company->setFacebook('http://www.facebook.com');
            $company->setInstagram('http://www.instagram.com');
            $company->setLinkedin('http://www.linkedin.com');
            $company->setNeed($faker->paragraph(8));
            $company->setUser($this->getReference('user_' . $i));
            $manager->persist($company);
            $this->addReference('company_' . $i, $company);
        }

        $company = new Company();
        $company->setDenomination('Mcdonald\'s');
        $company->setSiret(preg_replace('/\s+/', '', $faker->siret));
        $company->setApeCode(rand(1001, 9999) . 'B');
        $company->setAddress('440 route Nationale 20');
        $company->setPostalCode('45400');
        $company->setCity('Fleury-les-Aubrais');
        $company->setVatNumber(preg_replace('/\s+/', '', $faker->vat));
        $company->setContactRole($faker->jobTitle);
        $company->setCompanyNumber((int)$faker->serviceNumber());
        $company->setWebsite('http://www.lesite.fr');
        $company->setFacebook('http://www.facebook.com');
        $company->setInstagram('http://www.instagram.com');
        $company->setLinkedin('http://www.linkedin.com');
        $company->setNeed($faker->paragraph(8));
        $company->setUser($this->getReference('user_will'));
        $manager->persist($company);
        $this->addReference('company_mcdo', $company);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
}
