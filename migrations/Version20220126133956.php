<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220126133956 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('INSERT INTO  sector (name) VALUES ("Compétences techniques"),("Compétences relationnelles"),("Compétences en communication"),("Compétences organisationnelles"),("Compétences comportementales / sociales"),("Compétences commerciales"),("Compétences managériales"),("Compétences transversales"),("Compétences linguistiques"),("Autres compétences")');
        $this->addSql('INSERT INTO  formation_level (level) VALUES ("CAP"),("BEP"),("Baccalauréat"),("DEUG"),("BTS"),("DUT"),("DEUST"),("Licence"),("Licence professionnelle"),("BUT"),("Maîtrise"),("Master"),("Doctorat"),("Autres")');
        $this->addSql('INSERT INTO  contrat (name) VALUES ("CDI"),("CDD"),("CDD tremplin"),("Alternance - contrat de professionnalisation"),("Alternance - contrat d\'apprentissage"),("Stage - courte durée"),("Stage - longue durée")');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('TRUNCATE sector');
        $this->addSql('TRUNCATE formation_level');
        $this->addSql('TRUNCATE contrat');

    }
}
