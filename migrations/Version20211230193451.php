<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211230193451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hobby ADD candidat_id INT NOT NULL');
        $this->addSql('ALTER TABLE hobby ADD CONSTRAINT FK_3964F3378D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('CREATE INDEX IDX_3964F3378D0EB82 ON hobby (candidat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hobby DROP FOREIGN KEY FK_3964F3378D0EB82');
        $this->addSql('DROP INDEX IDX_3964F3378D0EB82 ON hobby');
        $this->addSql('ALTER TABLE hobby DROP candidat_id');
    }
}
