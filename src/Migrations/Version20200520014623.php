<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200520014623 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE drilling_pmh (id INT AUTO_INCREMENT NOT NULL, pomp_brand VARCHAR(255) DEFAULT NULL, pump_power DOUBLE PRECISION DEFAULT NULL, superstructure VARCHAR(255) DEFAULT NULL, draining_channel VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lost_well ADD drilling_pmh_id INT NOT NULL');
        $this->addSql('ALTER TABLE lost_well ADD CONSTRAINT FK_975D9144519299CC FOREIGN KEY (drilling_pmh_id) REFERENCES drilling_pmh (id)');
        $this->addSql('CREATE INDEX IDX_975D9144519299CC ON lost_well (drilling_pmh_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lost_well DROP FOREIGN KEY FK_975D9144519299CC');
        $this->addSql('DROP TABLE drilling_pmh');
        $this->addSql('DROP INDEX IDX_975D9144519299CC ON lost_well');
        $this->addSql('ALTER TABLE lost_well DROP drilling_pmh_id');
    }
}
