<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220112100131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE experience ADD contrat_id INT DEFAULT NULL, ADD phone_referent VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C1031823061F FOREIGN KEY (contrat_id) REFERENCES contrat (id)');
        $this->addSql('CREATE INDEX IDX_590C1031823061F ON experience (contrat_id)');
        $this->addSql('ALTER TABLE experience ADD start_date DATE NOT NULL, ADD end_date DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C1031823061F');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP INDEX IDX_590C1031823061F ON experience');
        $this->addSql('ALTER TABLE experience DROP contrat_id, DROP phone_referent');
        $this->addSql('ALTER TABLE experience DROP start_date, DROP end_date');
    }
}
