<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220130103648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE additional_document (id INT AUTO_INCREMENT NOT NULL, candidate_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, updated_at DATETIME NOT NULL, INDEX IDX_62B836A091BD8781 (candidate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, birth_date DATE DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) DEFAULT NULL, city VARCHAR(155) DEFAULT NULL, time_search VARCHAR(255) DEFAULT NULL, search_quality VARCHAR(255) DEFAULT NULL, profil_quality VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C8B28E44A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate_comment (id INT AUTO_INCREMENT NOT NULL, candidate_id INT DEFAULT NULL, comment LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_1BA5FFCD91BD8781 (candidate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate_language (id INT AUTO_INCREMENT NOT NULL, candidate_id INT NOT NULL, name VARCHAR(100) NOT NULL, INDEX IDX_7585336691BD8781 (candidate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, denomination VARCHAR(100) DEFAULT NULL, siret VARCHAR(14) DEFAULT NULL, ape_code VARCHAR(5) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(5) DEFAULT NULL, city VARCHAR(100) DEFAULT NULL, vat_number VARCHAR(13) DEFAULT NULL, contact_role VARCHAR(100) DEFAULT NULL, business_area VARCHAR(255) DEFAULT NULL, collective_agreement VARCHAR(5) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, linkedin VARCHAR(255) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, instagram VARCHAR(255) DEFAULT NULL, need LONGTEXT DEFAULT NULL, company_number VARCHAR(10) DEFAULT NULL, UNIQUE INDEX UNIQ_4FBF094FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_comment (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, comment LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_B42648BB979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, picture VARCHAR(255) DEFAULT NULL, role VARCHAR(255) NOT NULL, civility VARCHAR(10) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, candidate_id INT DEFAULT NULL, contrat_id INT DEFAULT NULL, job_name VARCHAR(100) NOT NULL, place VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, referent_name VARCHAR(100) DEFAULT NULL, phone_referent VARCHAR(255) DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, INDEX IDX_590C10391BD8781 (candidate_id), INDEX IDX_590C1031823061F (contrat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, candidate_id INT DEFAULT NULL, level_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, place VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, referent VARCHAR(100) DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, phone_referent VARCHAR(255) DEFAULT NULL, INDEX IDX_404021BF91BD8781 (candidate_id), INDEX IDX_404021BF5FB14BA7 (level_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_level (id INT AUTO_INCREMENT NOT NULL, level VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hobby (id INT AUTO_INCREMENT NOT NULL, candidate_id INT NOT NULL, name VARCHAR(100) NOT NULL, INDEX IDX_3964F33791BD8781 (candidate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sector (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_E19D9AD212469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, type VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, sector_id INT NOT NULL, candidate_id INT NOT NULL, name VARCHAR(100) NOT NULL, INDEX IDX_5E3DE477DE95C867 (sector_id), INDEX IDX_5E3DE47791BD8781 (candidate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE soft_skill (id INT AUTO_INCREMENT NOT NULL, candidate_id INT NOT NULL, name VARCHAR(100) NOT NULL, INDEX IDX_164AECD491BD8781 (candidate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, lastname VARCHAR(100) NOT NULL, firstname VARCHAR(100) NOT NULL, phone_number VARCHAR(255) NOT NULL, gender VARCHAR(10) NOT NULL, is_verified TINYINT(1) NOT NULL, created_at DATE NOT NULL, reference VARCHAR(15) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE additional_document ADD CONSTRAINT FK_62B836A091BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidate_comment ADD CONSTRAINT FK_1BA5FFCD91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE candidate_language ADD CONSTRAINT FK_7585336691BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE company_comment ADD CONSTRAINT FK_B42648BB979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C10391BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C1031823061F FOREIGN KEY (contrat_id) REFERENCES contrat (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF91BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF5FB14BA7 FOREIGN KEY (level_id) REFERENCES formation_level (id)');
        $this->addSql('ALTER TABLE hobby ADD CONSTRAINT FK_3964F33791BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD212469DE2 FOREIGN KEY (category_id) REFERENCES service_category (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE477DE95C867 FOREIGN KEY (sector_id) REFERENCES sector (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE47791BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE soft_skill ADD CONSTRAINT FK_164AECD491BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('INSERT INTO sector (name) VALUES ("Compétences techniques"),("Compétences relationnelles"),("Compétences en communication"),("Compétences organisationnelles"),("Compétences comportementales / sociales"),("Compétences commerciales"),("Compétences managériales"),("Compétences transversales"),("Compétences linguistiques"),("Autres compétences")');
        $this->addSql('INSERT INTO formation_level (level) VALUES ("CAP"),("BEP"),("Baccalauréat"),("DEUG"),("BTS"),("DUT"),("DEUST"),("Licence"),("Licence professionnelle"),("BUT"),("Maîtrise"),("Master"),("Doctorat"),("Autres")');
        $this->addSql('INSERT INTO contrat (name) VALUES ("CDI"),("CDD"),("CDD tremplin"),("Alternance - contrat de professionnalisation"),("Alternance - contrat d\'apprentissage"),("Stage - courte durée"),("Stage - longue durée")');
        $this->addSql("INSERT INTO `service_category` (`title`,`type`) VALUES ('Coaching personnalisé','Candidat'), ('Prestations de services','Candidat'), ('Conseils & Expertise RH','Entreprise'), ('Appui administratif','Entreprise'), ('Cabinet recrutement (haut profil & métiers en tension)','Entreprise')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE additional_document DROP FOREIGN KEY FK_62B836A091BD8781');
        $this->addSql('ALTER TABLE candidate_comment DROP FOREIGN KEY FK_1BA5FFCD91BD8781');
        $this->addSql('ALTER TABLE candidate_language DROP FOREIGN KEY FK_7585336691BD8781');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C10391BD8781');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF91BD8781');
        $this->addSql('ALTER TABLE hobby DROP FOREIGN KEY FK_3964F33791BD8781');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE47791BD8781');
        $this->addSql('ALTER TABLE soft_skill DROP FOREIGN KEY FK_164AECD491BD8781');
        $this->addSql('ALTER TABLE company_comment DROP FOREIGN KEY FK_B42648BB979B1AD6');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C1031823061F');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF5FB14BA7');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE477DE95C867');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD212469DE2');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44A76ED395');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FA76ED395');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE additional_document');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE candidate_comment');
        $this->addSql('DROP TABLE candidate_language');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE company_comment');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE employee');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE formation_level');
        $this->addSql('DROP TABLE hobby');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE sector');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE service_category');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE soft_skill');
        $this->addSql('DROP TABLE user');
    }
}
