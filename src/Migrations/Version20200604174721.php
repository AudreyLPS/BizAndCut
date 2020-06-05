<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
<<<<<<< HEAD:src/Migrations/Version20200604153103.php
final class Version20200604153103 extends AbstractMigration
=======
final class Version20200604174721 extends AbstractMigration
>>>>>>> 8533d91f83891d7d2783d0b3c584ab84d7affbb7:src/Migrations/Version20200604174721.php
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
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT NOT NULL, devis_statut_id INT NOT NULL, nb_participants INT NOT NULL, date DATE NOT NULL, heure_debut VARCHAR(10) NOT NULL, heure_fin VARCHAR(10) NOT NULL, libelle VARCHAR(500) NOT NULL, nb_coiffeurs INT NOT NULL, INDEX IDX_8B27C52BA4AEAFEA (entreprise_id), INDEX IDX_8B27C52B87F3F27E (devis_statut_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis_statut (id INT AUTO_INCREMENT NOT NULL, texte_devis_statut VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, devis_id INT NOT NULL, UNIQUE INDEX UNIQ_D499BFF641DEFADA (devis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52BA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B87F3F27E FOREIGN KEY (devis_statut_id) REFERENCES devis_statut (id)');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF641DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE evenements_entreprises ADD CONSTRAINT FK_8DE59B0FDAC5BE2B FOREIGN KEY (entreprise_id_id) REFERENCES user (id)');
        $this->addSql('DROP INDEX IDX_331112A4FD02F13 ON evenements_salaries');
        $this->addSql('ALTER TABLE evenements_salaries CHANGE evenement_id devis_id INT NOT NULL');
        $this->addSql('ALTER TABLE evenements_salaries ADD CONSTRAINT FK_331112A441DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('CREATE INDEX IDX_331112A441DEFADA ON evenements_salaries (devis_id)');
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
        $this->addSql('ALTER TABLE evenements_salaries DROP FOREIGN KEY FK_331112A441DEFADA');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF641DEFADA');
        $this->addSql('ALTER TABLE propositions DROP FOREIGN KEY FK_E9AB028641DEFADA');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B87F3F27E');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F863D865311');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE devis_statut');
        $this->addSql('DROP TABLE planning');
        $this->addSql('DROP INDEX IDX_331112A441DEFADA ON evenements_salaries');
        $this->addSql('ALTER TABLE evenements_salaries CHANGE devis_id evenement_id INT NOT NULL');
        $this->addSql('CREATE INDEX IDX_331112A4FD02F13 ON evenements_salaries (evenement_id)');
    }
}
