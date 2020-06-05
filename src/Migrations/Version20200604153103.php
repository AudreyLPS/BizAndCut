<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200604153103 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, nom VARCHAR(180) NOT NULL, prenom VARCHAR(180) NOT NULL, deleted INT NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, civilite VARCHAR(50) DEFAULT NULL, nb_annees_exp INT DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, telephone VARCHAR(20) DEFAULT NULL, adresse VARCHAR(500) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, cp VARCHAR(10) DEFAULT NULL, distance INT DEFAULT NULL, nom_entreprise VARCHAR(500) DEFAULT NULL, fonction_entreprise VARCHAR(500) DEFAULT NULL, siren_entreprise VARCHAR(10) DEFAULT NULL, telephone_entreprise VARCHAR(20) DEFAULT NULL, adresse_entreprise VARCHAR(500) DEFAULT NULL, ville_entreprise VARCHAR(255) DEFAULT NULL, cp_entreprise VARCHAR(20) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT NOT NULL, devis_statut_id INT NOT NULL, nb_participants_devis INT NOT NULL, date_evenement_devis DATE NOT NULL, nb_heures_devis INT NOT NULL, INDEX IDX_8B27C52BA4AEAFEA (entreprise_id), INDEX IDX_8B27C52B87F3F27E (devis_statut_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis_statut (id INT AUTO_INCREMENT NOT NULL, texte_devis_statut VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenements (id INT AUTO_INCREMENT NOT NULL, devis_id INT NOT NULL, date_evenement DATE NOT NULL, heure_devenement VARCHAR(10) NOT NULL, heure_fevenement VARCHAR(10) NOT NULL, description_evenement VARCHAR(500) NOT NULL, nb_coiffeurs_evenement INT NOT NULL, UNIQUE INDEX UNIQ_E10AD40041DEFADA (devis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenements_entreprises (id INT AUTO_INCREMENT NOT NULL, entreprise_id_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_8DE59B0FDAC5BE2B (entreprise_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenements_salaries (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_331112A4FD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participations (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, coiffeur_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, UNIQUE INDEX UNIQ_D499BFF6FD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_coiffeur (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, rib VARCHAR(500) NOT NULL, note INT NOT NULL, diplome VARCHAR(150) NOT NULL, UNIQUE INDEX UNIQ_DFCAD158A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE propositions (id INT AUTO_INCREMENT NOT NULL, devis_id INT NOT NULL, coiffeur_id INT NOT NULL, montant INT NOT NULL, validation_bc TINYINT(1) NOT NULL, date_proposition DATE NOT NULL, validation_entreprise TINYINT(1) NOT NULL, INDEX IDX_E9AB028641DEFADA (devis_id), INDEX IDX_E9AB0286BD427C57 (coiffeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, planning_id INT NOT NULL, email VARCHAR(180) NOT NULL, nom VARCHAR(180) NOT NULL, prenom VARCHAR(180) NOT NULL, UNIQUE INDEX UNIQ_10C31F86E7927C74 (email), INDEX IDX_10C31F863D865311 (planning_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52BA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B87F3F27E FOREIGN KEY (devis_statut_id) REFERENCES devis_statut (id)');
        $this->addSql('ALTER TABLE evenements ADD CONSTRAINT FK_E10AD40041DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE evenements_entreprises ADD CONSTRAINT FK_8DE59B0FDAC5BE2B FOREIGN KEY (entreprise_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE evenements_salaries ADD CONSTRAINT FK_331112A4FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenements (id)');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF6FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenements (id)');
        $this->addSql('ALTER TABLE profil_coiffeur ADD CONSTRAINT FK_DFCAD158A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE propositions ADD CONSTRAINT FK_E9AB028641DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE propositions ADD CONSTRAINT FK_E9AB0286BD427C57 FOREIGN KEY (coiffeur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F863D865311 FOREIGN KEY (planning_id) REFERENCES planning (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52BA4AEAFEA');
        $this->addSql('ALTER TABLE evenements_entreprises DROP FOREIGN KEY FK_8DE59B0FDAC5BE2B');
        $this->addSql('ALTER TABLE profil_coiffeur DROP FOREIGN KEY FK_DFCAD158A76ED395');
        $this->addSql('ALTER TABLE propositions DROP FOREIGN KEY FK_E9AB0286BD427C57');
        $this->addSql('ALTER TABLE evenements DROP FOREIGN KEY FK_E10AD40041DEFADA');
        $this->addSql('ALTER TABLE propositions DROP FOREIGN KEY FK_E9AB028641DEFADA');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B87F3F27E');
        $this->addSql('ALTER TABLE evenements_salaries DROP FOREIGN KEY FK_331112A4FD02F13');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF6FD02F13');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F863D865311');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE devis_statut');
        $this->addSql('DROP TABLE evenements');
        $this->addSql('DROP TABLE evenements_entreprises');
        $this->addSql('DROP TABLE evenements_salaries');
        $this->addSql('DROP TABLE participations');
        $this->addSql('DROP TABLE planning');
        $this->addSql('DROP TABLE profil_coiffeur');
        $this->addSql('DROP TABLE propositions');
        $this->addSql('DROP TABLE rdv');
    }
}
