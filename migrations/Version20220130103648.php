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
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, denomination VARCHAR(100) DEFAULT NULL, siret VARCHAR(14) DEFAULT NULL, ape_code VARCHAR(5) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(5) DEFAULT NULL, city VARCHAR(100) DEFAULT NULL, vat_number VARCHAR(13) DEFAULT NULL, contact_role VARCHAR(100) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, linkedin VARCHAR(255) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, instagram VARCHAR(255) DEFAULT NULL, need LONGTEXT DEFAULT NULL, company_number VARCHAR(10) DEFAULT NULL, UNIQUE INDEX UNIQ_4FBF094FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
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
        $this->addSql("INSERT INTO `service` (`category_id`, `title`, `description`) VALUES ('1','Rédaction des CV et lettre motivation',null), ('1','Mise en situation d’entretien virtuel ou dans un cadre physique professionnel calme (bureau, café, …)',null), ('1','Aide à la stratégie de recherche et de candidature',null), ('1','Stratégie de présence réseaux sociaux','Notre approche 360° tournée tant vers les besoins des entreprises que ceux des candidats en recherche d’un nouvel emploi nous permet d’apporter un coaching personnalisé centré sur l’humain et la réalité du marché. Que vous souhaitiez être accompagné dans la création de vos CVs, de vos lettres de motivation, la mise en valeur de vos références, de vos savoir-faire et de votre savoir-être, Cerha vous conseille et vous accompagne dans toutes vos démarches. Nous sommes également en mesure de vous aider dans votre stratégie de recherche des offres, votre présence sur les réseaux sociaux (linkedin, facebook et instagram), et vous proposons régulièrement des mises en situation réelle d’entretien téléphonique, virtuel et en présentiel.'), ('2','Tests de personnalité',null), ('2','Test de compétences',null), ('2','Analyse-rédaction de CV personnalisé',null), ('2','Appui à la recherche de poste','Vous rechercher plus qu’un accompagnement et souhaitez nous confiez la création de votre CV, la rédaction de vos lettres de motivation, votre recherche d’emploi, … Ces actions ne sont pas anodines et dépendent d’énormément de paramètres. Nous pouvons vous accompagner dans ces tâches, vous donnant une aide additionnelle à trouver le contrat que vous souhaitez !'), ('3','Audit RH (identification des besoins réel en RH, verrous et levier à actionner)','Nous sommes un cabinet de conseils et de renforcement stratégique de la politique RH des entreprises. Notre savoir-faire en la matière nous permet d’identifier les verrous et leviers de solutions adaptés à la taille de votre entreprise et son champs d’activité. A travers un ensemble d’audits ciblés avec vos équipes directement au sein de votre entreprise, nous apportons une vision objective et éclairée de vos besoins en RH (recrutements à court et moyen terme, plan d’évolution de carrière, externalisation des compétences, politique RH et RSE, etc.). CERHA restitue des rapports d’audits vous permettant de facilement mettre en pratique votre nouvelle stratégie !'), ('3','Stratégie RH (problème recrutement, juridique, informations liée à l’inclusion)','Vous avez identifiés des besoins précis pour la mise en œuvre de votre stratégie RH et avez besoin d’un appuie technique et administratif? Cerha vous accompagne dans la mise en pratique de votre stratégie RH. Qu’il s’agisse d’un plan de recrutement, de problématiques d’ordre juridique ou administratives pour votre entreprise ou vos salariés, ou encore la mise en œuvre d’une politique d’inclusion, nos experts sont en mesure de vous apporter les réponses à vos questions'), ('3','Politique d’entreprise (harmonisation cv, évolution des compétences, suivi d’intégration et d’évolution …)','Aujourd’hui, de nombreuses entreprises misent sur l’harmonisation des CV de leurs salariés et leurs communications sur les réseaux sociaux (LinkedIn, Twitter, Instagram), l’évolution et l’évaluation de leurs compétences et l’intégration des nouveaux collaborateurs, Au Cerha, nous avons développé nos prestation pour répondre à vos besoins en matière de politique RH, Par exemple, nous réalisons des suivis d’intégration et d’évaluation des compétences et du bien-être de vos salariés à différents moments clés de l’année. Ces suivis sont confrontés aux suivi interne de vos services pour identifier des points d’amélioration de part et d’autre pour une optimisation de votre collaborations.'), ('4','Aides, subventions, optimisation fiscale pour les RH','Notre connaissance du secteur des financements public associé aux RH est un atout pour limiter vos dépenses et vous aider à soutenir vos investissements humains. Sur la base de divers critères, nous identifions pour vous les guichets d’aides adaptés à votre entreprise, incluant des subventions, des avances remboursable et des optimisation fiscale (exonération sociale, par exemple), montons vos dossier et assurons le suivi avec l’administration jusqu’à l’obtention de votre aide.'), ('4','Relationnel école alternance, CFA, OPCO, pole emploi ….','Nous sommes pleinement conscient que les relations entre les CFA, les OPCO, pôle emploi ou encore d’autres institutions et votre entreprises sont loin d’être de tout repos. C’est pourquoi, nous vous proposons d’être le trait d’union entre vous et ces entités, vous permettant de consacrer du temps pour votre activité.'), ('4','Saisie des dossiers administratifs','Au-delà de notre expertise technique, nous pouvons assurer les communications et montage de dossier administratifs entre votre structures et différents organismes publics tel que pôle emploi, les CFA, les OPCO …'), ('5','Processus de recrutement CERHA complet ou à la carte selon besoin',null), ('5','Qualification des candidats (cv)',null), ('5','Contrôle des références',null), ('5','Tests techniques et psychotechniques',null), ('5','Suivi d’intégration entreprise et candidat : indépendamment l’un de l’autre. Pouvant ouvrir à de l’arbitrage en cas de difficulté d’intégration',null)");

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
