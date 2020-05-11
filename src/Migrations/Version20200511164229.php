<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200511164229 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE admins (id INT AUTO_INCREMENT NOT NULL, nom_admin VARCHAR(255) NOT NULL, prenom_admin VARCHAR(255) NOT NULL, identifiant_admin VARCHAR(255) NOT NULL, mdp_admin VARCHAR(255) NOT NULL, deleted_admin TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coiffeurs (id INT AUTO_INCREMENT NOT NULL, civilite_coiffeur VARCHAR(50) NOT NULL, nom_coiffeur VARCHAR(255) NOT NULL, prenom_coiffeur VARCHAR(255) NOT NULL, nb_annees_exp TINYINT(1) NOT NULL, type_coiffeur TINYINT(1) NOT NULL, email_coiffeur VARCHAR(255) NOT NULL, telephone_coiffeur VARCHAR(20) NOT NULL, adresse_coiffeur VARCHAR(500) NOT NULL, ville_coiffeur VARCHAR(255) NOT NULL, cp_coiffeur VARCHAR(10) NOT NULL, distance_coiffeur INT NOT NULL, mdp_coiffeur VARCHAR(255) NOT NULL, deleted_coiffeur TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coiffeurs_creneaux (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, coiffeur_id INT NOT NULL, horaires_coiffeur_creneau INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT NOT NULL, devis_statut_id INT NOT NULL, numero_devis INT NOT NULL, nb_participants_devis INT NOT NULL, date_evenement_devis DATE NOT NULL, nb_heures_devis INT NOT NULL, INDEX IDX_8B27C52BA4AEAFEA (entreprise_id), INDEX IDX_8B27C52B87F3F27E (devis_statut_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis_statut (id INT AUTO_INCREMENT NOT NULL, texte_devis_statut VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprises (id INT AUTO_INCREMENT NOT NULL, nom_entreprise VARCHAR(500) NOT NULL, prenom_nom_user_entreprise VARCHAR(500) NOT NULL, fonction_entreprise VARCHAR(500) NOT NULL, siren_entreprise VARCHAR(10) NOT NULL, statut_entreprise VARCHAR(500) NOT NULL, email_entreprise VARCHAR(255) NOT NULL, telephone_entreprise VARCHAR(20) NOT NULL, adresse_entreprise VARCHAR(500) NOT NULL, ville_entreprise VARCHAR(255) NOT NULL, cp_entreprise VARCHAR(20) NOT NULL, mdp_entreprise VARCHAR(255) NOT NULL, deleted_entreprise TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenements (id INT AUTO_INCREMENT NOT NULL, date_evenement DATE NOT NULL, heure_devenement VARCHAR(10) NOT NULL, heure_fevenement VARCHAR(10) NOT NULL, description_evenement VARCHAR(500) NOT NULL, nb_coiffeurs_evenement INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenements_entreprises (id INT AUTO_INCREMENT NOT NULL, entreprise_id_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_8DE59B0FDAC5BE2B (entreprise_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenements_salaries (id INT AUTO_INCREMENT NOT NULL, evenement_id_id INT NOT NULL, salarie_id_id INT NOT NULL, INDEX IDX_331112A4ECEE32AF (evenement_id_id), INDEX IDX_331112A45397FDF7 (salarie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salaries (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT NOT NULL, nom_salarie VARCHAR(255) NOT NULL, prenom_salarie VARCHAR(255) NOT NULL, email_salarie VARCHAR(255) NOT NULL, mdp_salarie VARCHAR(255) NOT NULL, deleted_salarie TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salaries_creneaux (id INT AUTO_INCREMENT NOT NULL, evenement_id_id INT NOT NULL, horaires_salarie_creneau INT NOT NULL, INDEX IDX_93670C10ECEE32AF (evenement_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52BA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprises (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B87F3F27E FOREIGN KEY (devis_statut_id) REFERENCES devis_statut (id)');
        $this->addSql('ALTER TABLE evenements_entreprises ADD CONSTRAINT FK_8DE59B0FDAC5BE2B FOREIGN KEY (entreprise_id_id) REFERENCES entreprises (id)');
        $this->addSql('ALTER TABLE evenements_salaries ADD CONSTRAINT FK_331112A4ECEE32AF FOREIGN KEY (evenement_id_id) REFERENCES evenements (id)');
        $this->addSql('ALTER TABLE evenements_salaries ADD CONSTRAINT FK_331112A45397FDF7 FOREIGN KEY (salarie_id_id) REFERENCES salaries (id)');
        $this->addSql('ALTER TABLE salaries_creneaux ADD CONSTRAINT FK_93670C10ECEE32AF FOREIGN KEY (evenement_id_id) REFERENCES evenements (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B87F3F27E');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52BA4AEAFEA');
        $this->addSql('ALTER TABLE evenements_entreprises DROP FOREIGN KEY FK_8DE59B0FDAC5BE2B');
        $this->addSql('ALTER TABLE evenements_salaries DROP FOREIGN KEY FK_331112A4ECEE32AF');
        $this->addSql('ALTER TABLE salaries_creneaux DROP FOREIGN KEY FK_93670C10ECEE32AF');
        $this->addSql('ALTER TABLE evenements_salaries DROP FOREIGN KEY FK_331112A45397FDF7');
        $this->addSql('DROP TABLE admins');
        $this->addSql('DROP TABLE coiffeurs');
        $this->addSql('DROP TABLE coiffeurs_creneaux');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE devis_statut');
        $this->addSql('DROP TABLE entreprises');
        $this->addSql('DROP TABLE evenements');
        $this->addSql('DROP TABLE evenements_entreprises');
        $this->addSql('DROP TABLE evenements_salaries');
        $this->addSql('DROP TABLE salaries');
        $this->addSql('DROP TABLE salaries_creneaux');
    }
}
