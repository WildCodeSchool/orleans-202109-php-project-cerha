<?php

namespace App\DataFixtures;

use App\Entity\AdditionalDocument;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DocumentFixtures extends Fixture
{
    public const DOCUMENTS = ['CV.pdf', 'CV.docx'];
    public function load(ObjectManager $manager): void
    {
        foreach (self::DOCUMENTS as $key => $data) {
            $document = new AdditionalDocument();
            $document->setName($data);
            $manager->persist($document);
            $this->addReference('document_' . $key, $document);
        }
        $manager->flush();
    }
}
