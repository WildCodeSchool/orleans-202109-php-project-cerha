<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227094236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_6AB5B471A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B471A76ED395 ON candidate (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_6AB5B471A76ED395');
        $this->addSql('DROP INDEX UNIQ_6AB5B471A76ED395 ON candidate');
        $this->addSql('ALTER TABLE candidate DROP user_id');
    }
}
