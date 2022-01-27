<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220126133956 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('INSERT INTO sector (name) VALUES ("Compétences techniques"),("Compétences relationnelles"),("Compétences en communication"),("Compétences organisationnelles"),("Compétences comportementales / sociales"),("Compétences commerciales"),("Compétences managériales"),("Compétences transversales"),("Compétences linguistiques"),("Autres compétences")');
        $this->addSql('INSERT INTO formation_level (level) VALUES ("CAP"),("BEP"),("Baccalauréat"),("DEUG"),("BTS"),("DUT"),("DEUST"),("Licence"),("Licence professionnelle"),("BUT"),("Maîtrise"),("Master"),("Doctorat"),("Autres")');
        $this->addSql('INSERT INTO contrat (name) VALUES ("CDI"),("CDD"),("CDD tremplin"),("Alternance - contrat de professionnalisation"),("Alternance - contrat d\'apprentissage"),("Stage - courte durée"),("Stage - longue durée")');
        $this->addSql("INSERT INTO `service_category` (`title`,`type`) VALUES ('Coaching personnalisé','Candidat'), ('Prestations de services','Candidat'), ('Conseils & Expertise RH','Entreprise'), ('Appui administratif','Entreprise'), ('Cabinet recrutement (haut profil & métiers en tension)','Entreprise')");
        $this->addSql("INSERT INTO `service` (`category_id`, `title`, `description`) VALUES ('1','Rédaction des CV et lettre motivation',null), ('1','Mise en situation d’entretien virtuel ou dans un cadre physique professionnel calme (bureau, café, …)',null), ('1','Aide à la stratégie de recherche et de candidature',null), ('1','Stratégie de présence réseaux sociaux','Notre approche 360° tournée tant vers les besoins des entreprises que ceux des candidats en recherche d’un nouvel emploi nous permet d’apporter un coaching personnalisé centré sur l’humain et la réalité du marché. Que vous souhaitiez être accompagné dans la création de vos CVs, de vos lettres de motivation, la mise en valeur de vos références, de vos savoir-faire et de votre savoir-être, Cerha vous conseille et vous accompagne dans toutes vos démarches. Nous sommes également en mesure de vous aider dans votre stratégie de recherche des offres, votre présence sur les réseaux sociaux (linkedin, facebook et instagram), et vous proposons régulièrement des mises en situation réelle d’entretien téléphonique, virtuel et en présentiel.'), ('2','Tests de personnalité',null), ('2','Test de compétences',null), ('2','Analyse-rédaction de CV personnalisé',null), ('2','Appui à la recherche de poste','Vous rechercher plus qu’un accompagnement et souhaitez nous confiez la création de votre CV, la rédaction de vos lettres de motivation, votre recherche d’emploi, … Ces actions ne sont pas anodines et dépendent d’énormément de paramètres. Nous pouvons vous accompagner dans ces tâches, vous donnant une aide additionnelle à trouver le contrat que vous souhaitez !'), ('3','Audit RH (identification des besoins réel en RH, verrous et levier à actionner)','Nous sommes un cabinet de conseils et de renforcement stratégique de la politique RH des entreprises. Notre savoir-faire en la matière nous permet d’identifier les verrous et leviers de solutions adaptés à la taille de votre entreprise et son champs d’activité. A travers un ensemble d’audits ciblés avec vos équipes directement au sein de votre entreprise, nous apportons une vision objective et éclairée de vos besoins en RH (recrutements à court et moyen terme, plan d’évolution de carrière, externalisation des compétences, politique RH et RSE, etc.). CERHA restitue des rapports d’audits vous permettant de facilement mettre en pratique votre nouvelle stratégie !'), ('3','Stratégie RH (problème recrutement, juridique, informations liée à l’inclusion)','Vous avez identifiés des besoins précis pour la mise en œuvre de votre stratégie RH et avez besoin d’un appuie technique et administratif? Cerha vous accompagne dans la mise en pratique de votre stratégie RH. Qu’il s’agisse d’un plan de recrutement, de problématiques d’ordre juridique ou administratives pour votre entreprise ou vos salariés, ou encore la mise en œuvre d’une politique d’inclusion, nos experts sont en mesure de vous apporter les réponses à vos questions'), ('3','Politique d’entreprise (harmonisation cv, évolution des compétences, suivi d’intégration et d’évolution …)','Aujourd’hui, de nombreuses entreprises misent sur l’harmonisation des CV de leurs salariés et leurs communications sur les réseaux sociaux (LinkedIn, Twitter, Instagram), l’évolution et l’évaluation de leurs compétences et l’intégration des nouveaux collaborateurs, Au Cerha, nous avons développé nos prestation pour répondre à vos besoins en matière de politique RH, Par exemple, nous réalisons des suivis d’intégration et d’évaluation des compétences et du bien-être de vos salariés à différents moments clés de l’année. Ces suivis sont confrontés aux suivi interne de vos services pour identifier des points d’amélioration de part et d’autre pour une optimisation de votre collaborations.'), ('4','Aides, subventions, optimisation fiscale pour les RH','Notre connaissance du secteur des financements public associé aux RH est un atout pour limiter vos dépenses et vous aider à soutenir vos investissements humains. Sur la base de divers critères, nous identifions pour vous les guichets d’aides adaptés à votre entreprise, incluant des subventions, des avances remboursable et des optimisation fiscale (exonération sociale, par exemple), montons vos dossier et assurons le suivi avec l’administration jusqu’à l’obtention de votre aide.'), ('4','Relationnel école alternance, CFA, OPCO, pole emploi ….','Nous sommes pleinement conscient que les relations entre les CFA, les OPCO, pôle emploi ou encore d’autres institutions et votre entreprises sont loin d’être de tout repos. C’est pourquoi, nous vous proposons d’être le trait d’union entre vous et ces entités, vous permettant de consacrer du temps pour votre activité.'), ('4','Saisie des dossiers administratifs','Au-delà de notre expertise technique, nous pouvons assurer les communications et montage de dossier administratifs entre votre structures et différents organismes publics tel que pôle emploi, les CFA, les OPCO …'), ('5','Processus de recrutement CERHA complet ou à la carte selon besoin',null), ('5','Qualification des candidats (cv)',null), ('5','Contrôle des références',null), ('5','Tests techniques et psychotechniques',null), ('5','Suivi d’intégration entreprise et candidat : indépendamment l’un de l’autre. Pouvant ouvrir à de l’arbitrage en cas de difficulté d’intégration',null)");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('TRUNCATE sector');
        $this->addSql('TRUNCATE formation_level');
        $this->addSql('TRUNCATE contrat');
        $this->addSql('TRUNCATE service_category');
    }
}
