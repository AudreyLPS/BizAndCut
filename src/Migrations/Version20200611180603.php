<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200611180603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mails (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, email VARCHAR(180) NOT NULL, nom VARCHAR(500) NOT NULL, telephone VARCHAR(20) NOT NULL, message VARCHAR(500) NOT NULL, UNIQUE INDEX UNIQ_63582005E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, rib VARCHAR(500) NOT NULL, note INT NOT NULL, diplome VARCHAR(150) NOT NULL, user INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE profil_coiffeur');
        $this->addSql('ALTER TABLE user ADD notif TINYINT(1) DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE civilite civilite VARCHAR(50) DEFAULT NULL, CHANGE nb_annees_exp nb_annees_exp INT DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone VARCHAR(20) DEFAULT NULL, CHANGE adresse adresse VARCHAR(500) DEFAULT NULL, CHANGE ville ville VARCHAR(255) DEFAULT NULL, CHANGE cp cp VARCHAR(10) DEFAULT NULL, CHANGE distance distance INT DEFAULT NULL, CHANGE nom_entreprise nom_entreprise VARCHAR(500) DEFAULT NULL, CHANGE fonction_entreprise fonction_entreprise VARCHAR(500) DEFAULT NULL, CHANGE siren_entreprise siren_entreprise VARCHAR(10) DEFAULT NULL, CHANGE telephone_entreprise telephone_entreprise VARCHAR(20) DEFAULT NULL, CHANGE adresse_entreprise adresse_entreprise VARCHAR(500) DEFAULT NULL, CHANGE ville_entreprise ville_entreprise VARCHAR(255) DEFAULT NULL, CHANGE cp_entreprise cp_entreprise VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE devis ADD nb_inscrit INT NOT NULL');
        $this->addSql('ALTER TABLE rdv ADD heure_creneau INT NOT NULL, DROP heureCreneau');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE profil_coiffeur (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, rib VARCHAR(500) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, note INT NOT NULL, diplome VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_DFCAD158A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE profil_coiffeur ADD CONSTRAINT FK_DFCAD158A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE mails');
        $this->addSql('DROP TABLE profil');
        $this->addSql('ALTER TABLE devis DROP nb_inscrit');
        $this->addSql('ALTER TABLE rdv ADD heureCreneau VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, DROP heure_creneau');
        $this->addSql('ALTER TABLE user DROP notif, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE civilite civilite VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE nb_annees_exp nb_annees_exp INT DEFAULT NULL, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cp cp VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE distance distance INT DEFAULT NULL, CHANGE nom_entreprise nom_entreprise VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE fonction_entreprise fonction_entreprise VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE siren_entreprise siren_entreprise VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone_entreprise telephone_entreprise VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_entreprise adresse_entreprise VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE ville_entreprise ville_entreprise VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cp_entreprise cp_entreprise VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
