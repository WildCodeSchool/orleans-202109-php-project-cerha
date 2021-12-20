<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211220153731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat CHANGE birth_date birth_date DATE NOT NULL, CHANGE adress adress VARCHAR(255) NOT NULL, CHANGE postal_code postal_code INT NOT NULL, CHANGE city city VARCHAR(155) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat CHANGE birth_date birth_date DATE DEFAULT NULL, CHANGE adress adress VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE postal_code postal_code INT DEFAULT NULL, CHANGE city city VARCHAR(155) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
