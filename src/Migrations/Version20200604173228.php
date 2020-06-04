<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200604173228 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE evenements_salaries DROP FOREIGN KEY FK_331112A4FD02F13');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF6FD02F13');
        $this->addSql('DROP TABLE evenements');
        $this->addSql('DROP INDEX IDX_331112A4FD02F13 ON evenements_salaries');
        $this->addSql('ALTER TABLE evenements_salaries CHANGE evenement_id devis_id INT NOT NULL');
        $this->addSql('ALTER TABLE evenements_salaries ADD CONSTRAINT FK_331112A441DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('CREATE INDEX IDX_331112A441DEFADA ON evenements_salaries (devis_id)');
        $this->addSql('DROP INDEX UNIQ_D499BFF6FD02F13 ON planning');
        $this->addSql('ALTER TABLE planning CHANGE evenement_id devis_id INT NOT NULL');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF641DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D499BFF641DEFADA ON planning (devis_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE evenements (id INT AUTO_INCREMENT NOT NULL, devis_id INT NOT NULL, date_evenement DATE NOT NULL, heure_devenement VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, heure_fevenement VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description_evenement VARCHAR(500) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nb_coiffeurs_evenement INT NOT NULL, UNIQUE INDEX UNIQ_E10AD40041DEFADA (devis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE evenements ADD CONSTRAINT FK_E10AD40041DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE evenements_salaries DROP FOREIGN KEY FK_331112A441DEFADA');
        $this->addSql('DROP INDEX IDX_331112A441DEFADA ON evenements_salaries');
        $this->addSql('ALTER TABLE evenements_salaries CHANGE devis_id evenement_id INT NOT NULL');
        $this->addSql('ALTER TABLE evenements_salaries ADD CONSTRAINT FK_331112A4FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenements (id)');
        $this->addSql('CREATE INDEX IDX_331112A4FD02F13 ON evenements_salaries (evenement_id)');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF641DEFADA');
        $this->addSql('DROP INDEX UNIQ_D499BFF641DEFADA ON planning');
        $this->addSql('ALTER TABLE planning CHANGE devis_id evenement_id INT NOT NULL');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF6FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenements (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D499BFF6FD02F13 ON planning (evenement_id)');
    }
}
