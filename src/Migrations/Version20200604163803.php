<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200604163803 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE evenements_entreprises (id INT AUTO_INCREMENT NOT NULL, entreprise_id_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_8DE59B0FDAC5BE2B (entreprise_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenements_salaries (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_331112A4FD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participations (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, coiffeur_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_coiffeur (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, rib VARCHAR(500) NOT NULL, note INT NOT NULL, diplome VARCHAR(150) NOT NULL, UNIQUE INDEX UNIQ_DFCAD158A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE propositions (id INT AUTO_INCREMENT NOT NULL, devis_id INT NOT NULL, coiffeur_id INT NOT NULL, montant INT NOT NULL, validation_bc TINYINT(1) NOT NULL, date_proposition DATE NOT NULL, validation_entreprise TINYINT(1) NOT NULL, INDEX IDX_E9AB028641DEFADA (devis_id), INDEX IDX_E9AB0286BD427C57 (coiffeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, planning_id INT NOT NULL, email VARCHAR(180) NOT NULL, nom VARCHAR(180) NOT NULL, prenom VARCHAR(180) NOT NULL, UNIQUE INDEX UNIQ_10C31F86E7927C74 (email), INDEX IDX_10C31F863D865311 (planning_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evenements_entreprises ADD CONSTRAINT FK_8DE59B0FDAC5BE2B FOREIGN KEY (entreprise_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE evenements_salaries ADD CONSTRAINT FK_331112A4FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenements (id)');
        $this->addSql('ALTER TABLE profil_coiffeur ADD CONSTRAINT FK_DFCAD158A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE propositions ADD CONSTRAINT FK_E9AB028641DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE propositions ADD CONSTRAINT FK_E9AB0286BD427C57 FOREIGN KEY (coiffeur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F863D865311 FOREIGN KEY (planning_id) REFERENCES planning (id)');
        $this->addSql('ALTER TABLE devis ADD nb_participant INT NOT NULL, ADD heure_debut VARCHAR(10) NOT NULL, ADD heure_fin VARCHAR(10) NOT NULL, ADD libelle VARCHAR(500) NOT NULL, ADD nb_coiffeurs INT NOT NULL, DROP nb_participants_devis, DROP nb_heures_devis, CHANGE date_evenement_devis date DATE NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE evenements_entreprises');
        $this->addSql('DROP TABLE evenements_salaries');
        $this->addSql('DROP TABLE participations');
        $this->addSql('DROP TABLE profil_coiffeur');
        $this->addSql('DROP TABLE propositions');
        $this->addSql('DROP TABLE rdv');
        $this->addSql('ALTER TABLE devis ADD nb_participants_devis INT NOT NULL, ADD nb_heures_devis INT NOT NULL, DROP nb_participant, DROP heure_debut, DROP heure_fin, DROP libelle, DROP nb_coiffeurs, CHANGE date date_evenement_devis DATE NOT NULL');
    }
}
