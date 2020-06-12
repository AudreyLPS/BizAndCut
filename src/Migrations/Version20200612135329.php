<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200612135329 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE satisfaction ADD coiffeur_id INT NOT NULL, ADD devis_id INT NOT NULL, DROP coiffeur, DROP devis');
        $this->addSql('ALTER TABLE satisfaction ADD CONSTRAINT FK_8A8E0C13BD427C57 FOREIGN KEY (coiffeur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE satisfaction ADD CONSTRAINT FK_8A8E0C1341DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('CREATE INDEX IDX_8A8E0C13BD427C57 ON satisfaction (coiffeur_id)');
        $this->addSql('CREATE INDEX IDX_8A8E0C1341DEFADA ON satisfaction (devis_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE satisfaction DROP FOREIGN KEY FK_8A8E0C13BD427C57');
        $this->addSql('ALTER TABLE satisfaction DROP FOREIGN KEY FK_8A8E0C1341DEFADA');
        $this->addSql('DROP INDEX IDX_8A8E0C13BD427C57 ON satisfaction');
        $this->addSql('DROP INDEX IDX_8A8E0C1341DEFADA ON satisfaction');
        $this->addSql('ALTER TABLE satisfaction ADD coiffeur INT NOT NULL, ADD devis INT NOT NULL, DROP coiffeur_id, DROP devis_id');
    }
}
