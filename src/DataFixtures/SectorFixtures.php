<?php

namespace App\DataFixtures;

use App\Entity\Sector;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SectorFixtures extends Fixture
{
public const SECTORS = ['Commercial', 'Siences', 'Gestion'];
public function load(ObjectManager $manager): void
{
foreach (self::SECTORS as $key => $data) {
$sector = new Sector();
$sector->setName($data);
$manager->persist($sector);
$this->addReference('sector_' . $key, $sector);
}
$manager->flush();
}
}