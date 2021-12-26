<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211224162021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soft_skill ADD candidat_id INT NOT NULL');
        $this->addSql('ALTER TABLE soft_skill ADD CONSTRAINT FK_164AECD48D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('CREATE INDEX IDX_164AECD48D0EB82 ON soft_skill (candidat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soft_skill DROP FOREIGN KEY FK_164AECD48D0EB82');
        $this->addSql('DROP INDEX IDX_164AECD48D0EB82 ON soft_skill');
        $this->addSql('ALTER TABLE soft_skill DROP candidat_id');
    }
}
