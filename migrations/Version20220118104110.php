<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220118104110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE additional_document RENAME INDEX idx_62b836a08d0eb82 TO IDX_62B836A091BD8781');
        $this->addSql('ALTER TABLE candidate RENAME INDEX uniq_6ab5b471a76ed395 TO UNIQ_C8B28E44A76ED395');
        $this->addSql('ALTER TABLE candidate_language RENAME INDEX idx_945d77258d0eb82 TO IDX_7585336691BD8781');
        $this->addSql('ALTER TABLE employee ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE experience RENAME INDEX idx_590c1038d0eb82 TO IDX_590C10391BD8781');
        $this->addSql('ALTER TABLE formation RENAME INDEX idx_404021bf8d0eb82 TO IDX_404021BF91BD8781');
        $this->addSql('ALTER TABLE hobby RENAME INDEX idx_3964f3378d0eb82 TO IDX_3964F33791BD8781');
        $this->addSql('ALTER TABLE skill RENAME INDEX idx_5e3de4778d0eb82 TO IDX_5E3DE47791BD8781');
        $this->addSql('ALTER TABLE soft_skill RENAME INDEX idx_164aecd48d0eb82 TO IDX_164AECD491BD8781');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE additional_document RENAME INDEX idx_62b836a091bd8781 TO IDX_62B836A08D0EB82');
        $this->addSql('ALTER TABLE candidate RENAME INDEX uniq_c8b28e44a76ed395 TO UNIQ_6AB5B471A76ED395');
        $this->addSql('ALTER TABLE candidate_language RENAME INDEX idx_7585336691bd8781 TO IDX_945D77258D0EB82');
        $this->addSql('ALTER TABLE employee DROP updated_at');
        $this->addSql('ALTER TABLE experience RENAME INDEX idx_590c10391bd8781 TO IDX_590C1038D0EB82');
        $this->addSql('ALTER TABLE formation RENAME INDEX idx_404021bf91bd8781 TO IDX_404021BF8D0EB82');
        $this->addSql('ALTER TABLE hobby RENAME INDEX idx_3964f33791bd8781 TO IDX_3964F3378D0EB82');
        $this->addSql('ALTER TABLE skill RENAME INDEX idx_5e3de47791bd8781 TO IDX_5E3DE4778D0EB82');
        $this->addSql('ALTER TABLE soft_skill RENAME INDEX idx_164aecd491bd8781 TO IDX_164AECD48D0EB82');
    }
}
