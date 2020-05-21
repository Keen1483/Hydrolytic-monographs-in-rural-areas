<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200521053345 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE local_informations (id INT AUTO_INCREMENT NOT NULL, region VARCHAR(255) NOT NULL, borough VARCHAR(255) NOT NULL, locality VARCHAR(255) NOT NULL, district VARCHAR(255) NOT NULL, population VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gps_coordinates ADD local_informations_id INT NOT NULL');
        $this->addSql('ALTER TABLE gps_coordinates ADD CONSTRAINT FK_5EC348F6613BAC13 FOREIGN KEY (local_informations_id) REFERENCES local_informations (id)');
        $this->addSql('CREATE INDEX IDX_5EC348F6613BAC13 ON gps_coordinates (local_informations_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE gps_coordinates DROP FOREIGN KEY FK_5EC348F6613BAC13');
        $this->addSql('DROP TABLE local_informations');
        $this->addSql('DROP INDEX IDX_5EC348F6613BAC13 ON gps_coordinates');
        $this->addSql('ALTER TABLE gps_coordinates DROP local_informations_id');
    }
}
