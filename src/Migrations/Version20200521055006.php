<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200521055006 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE local_informations ADD aep_id INT NOT NULL');
        $this->addSql('ALTER TABLE local_informations ADD CONSTRAINT FK_5E93E314D18739DF FOREIGN KEY (aep_id) REFERENCES aep (id)');
        $this->addSql('CREATE INDEX IDX_5E93E314D18739DF ON local_informations (aep_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE local_informations DROP FOREIGN KEY FK_5E93E314D18739DF');
        $this->addSql('DROP INDEX IDX_5E93E314D18739DF ON local_informations');
        $this->addSql('ALTER TABLE local_informations DROP aep_id');
    }
}
