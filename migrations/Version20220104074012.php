<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220104074012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, candidate_id INT DEFAULT NULL, level_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, place VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, referent VARCHAR(100) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, INDEX IDX_404021BF8D0EB82 (candidate_id), INDEX IDX_404021BF5FB14BA7 (level_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_level (id INT AUTO_INCREMENT NOT NULL, level VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF8D0EB82 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF5FB14BA7 FOREIGN KEY (level_id) REFERENCES formation_level (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF5FB14BA7');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE formation_level');
    }
}
