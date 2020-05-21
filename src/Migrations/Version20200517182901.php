<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200517182901 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE propositions (id INT AUTO_INCREMENT NOT NULL, devis_id INT NOT NULL, coiffeur_id INT NOT NULL, montant INT NOT NULL, validation_bc TINYINT(1) NOT NULL, date_proposition DATE NOT NULL, validation_entreprise TINYINT(1) NOT NULL, INDEX IDX_E9AB028641DEFADA (devis_id), INDEX IDX_E9AB0286BD427C57 (coiffeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE propositions ADD CONSTRAINT FK_E9AB028641DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE propositions ADD CONSTRAINT FK_E9AB0286BD427C57 FOREIGN KEY (coiffeur_id) REFERENCES coiffeurs (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE propositions');
    }
}
