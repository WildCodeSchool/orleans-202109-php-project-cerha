<?php

namespace App\DataFixtures;

use App\Entity\Contrat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContratFixtures extends Fixture
{
    public const CONTRATS = ['CDI', 'CDD', 'stage'];
    public function load(ObjectManager $manager): void
    {
        foreach (self::CONTRATS as $key => $data) {
            $contrat = new Contrat();
            $contrat->setName($data);
            $manager->persist($contrat);
            $this->addReference('contrat_' . $key, $contrat);
        }
        $manager->flush();
    }
}
