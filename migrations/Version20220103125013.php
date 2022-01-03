<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220103125013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sector (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, sector_id INT NOT NULL, candidat_id INT NOT NULL, name VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_5E3DE477DE95C867 (sector_id), INDEX IDX_5E3DE4778D0EB82 (candidat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE477DE95C867 FOREIGN KEY (sector_id) REFERENCES sector (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE4778D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE skill DROP INDEX UNIQ_5E3DE477DE95C867, ADD INDEX IDX_5E3DE477DE95C867 (sector_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE477DE95C867');
        $this->addSql('DROP TABLE sector');
        $this->addSql('DROP TABLE skill');
        $this->addSql('ALTER TABLE skill DROP INDEX IDX_5E3DE477DE95C867, ADD UNIQUE INDEX UNIQ_5E3DE477DE95C867 (sector_id)');
    }
}
