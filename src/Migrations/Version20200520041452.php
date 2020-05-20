<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200520041452 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE aep (id INT AUTO_INCREMENT NOT NULL, depth DOUBLE PRECISION NOT NULL, building_year DATETIME NOT NULL, funding VARCHAR(255) NOT NULL, production_capacity DOUBLE PRECISION NOT NULL, network_length DOUBLE PRECISION DEFAULT NULL, adduction_type VARCHAR(255) NOT NULL, linear_network LONGTEXT DEFAULT NULL, operating_state VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agent_communication_mode ADD aep_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE agent_communication_mode ADD CONSTRAINT FK_613A052CD18739DF FOREIGN KEY (aep_id) REFERENCES aep (id)');
        $this->addSql('CREATE INDEX IDX_613A052CD18739DF ON agent_communication_mode (aep_id)');
        $this->addSql('ALTER TABLE equipment_aep ADD aep_id INT NOT NULL');
        $this->addSql('ALTER TABLE equipment_aep ADD CONSTRAINT FK_CF5B5EBAD18739DF FOREIGN KEY (aep_id) REFERENCES aep (id)');
        $this->addSql('CREATE INDEX IDX_CF5B5EBAD18739DF ON equipment_aep (aep_id)');
        $this->addSql('ALTER TABLE funding_mode ADD aep_id INT NOT NULL');
        $this->addSql('ALTER TABLE funding_mode ADD CONSTRAINT FK_F07F663AD18739DF FOREIGN KEY (aep_id) REFERENCES aep (id)');
        $this->addSql('CREATE INDEX IDX_F07F663AD18739DF ON funding_mode (aep_id)');
        $this->addSql('ALTER TABLE maintenance ADD aep_id INT NOT NULL');
        $this->addSql('ALTER TABLE maintenance ADD CONSTRAINT FK_2F84F8E9D18739DF FOREIGN KEY (aep_id) REFERENCES aep (id)');
        $this->addSql('CREATE INDEX IDX_2F84F8E9D18739DF ON maintenance (aep_id)');
        $this->addSql('ALTER TABLE management_mode ADD aep_id INT NOT NULL');
        $this->addSql('ALTER TABLE management_mode ADD CONSTRAINT FK_32290BFD18739DF FOREIGN KEY (aep_id) REFERENCES aep (id)');
        $this->addSql('CREATE INDEX IDX_32290BFD18739DF ON management_mode (aep_id)');
        $this->addSql('ALTER TABLE sticking_back ADD aep_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sticking_back ADD CONSTRAINT FK_176C110FD18739DF FOREIGN KEY (aep_id) REFERENCES aep (id)');
        $this->addSql('CREATE INDEX IDX_176C110FD18739DF ON sticking_back (aep_id)');
        $this->addSql('ALTER TABLE storage ADD aep_id INT NOT NULL');
        $this->addSql('ALTER TABLE storage ADD CONSTRAINT FK_547A1B34D18739DF FOREIGN KEY (aep_id) REFERENCES aep (id)');
        $this->addSql('CREATE INDEX IDX_547A1B34D18739DF ON storage (aep_id)');
        $this->addSql('ALTER TABLE water_traitment_analysis ADD aep_id INT NOT NULL');
        $this->addSql('ALTER TABLE water_traitment_analysis ADD CONSTRAINT FK_68A52ECD18739DF FOREIGN KEY (aep_id) REFERENCES aep (id)');
        $this->addSql('CREATE INDEX IDX_68A52ECD18739DF ON water_traitment_analysis (aep_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE agent_communication_mode DROP FOREIGN KEY FK_613A052CD18739DF');
        $this->addSql('ALTER TABLE equipment_aep DROP FOREIGN KEY FK_CF5B5EBAD18739DF');
        $this->addSql('ALTER TABLE funding_mode DROP FOREIGN KEY FK_F07F663AD18739DF');
        $this->addSql('ALTER TABLE maintenance DROP FOREIGN KEY FK_2F84F8E9D18739DF');
        $this->addSql('ALTER TABLE management_mode DROP FOREIGN KEY FK_32290BFD18739DF');
        $this->addSql('ALTER TABLE sticking_back DROP FOREIGN KEY FK_176C110FD18739DF');
        $this->addSql('ALTER TABLE storage DROP FOREIGN KEY FK_547A1B34D18739DF');
        $this->addSql('ALTER TABLE water_traitment_analysis DROP FOREIGN KEY FK_68A52ECD18739DF');
        $this->addSql('DROP TABLE aep');
        $this->addSql('DROP INDEX IDX_613A052CD18739DF ON agent_communication_mode');
        $this->addSql('ALTER TABLE agent_communication_mode DROP aep_id');
        $this->addSql('DROP INDEX IDX_CF5B5EBAD18739DF ON equipment_aep');
        $this->addSql('ALTER TABLE equipment_aep DROP aep_id');
        $this->addSql('DROP INDEX IDX_F07F663AD18739DF ON funding_mode');
        $this->addSql('ALTER TABLE funding_mode DROP aep_id');
        $this->addSql('DROP INDEX IDX_2F84F8E9D18739DF ON maintenance');
        $this->addSql('ALTER TABLE maintenance DROP aep_id');
        $this->addSql('DROP INDEX IDX_32290BFD18739DF ON management_mode');
        $this->addSql('ALTER TABLE management_mode DROP aep_id');
        $this->addSql('DROP INDEX IDX_176C110FD18739DF ON sticking_back');
        $this->addSql('ALTER TABLE sticking_back DROP aep_id');
        $this->addSql('DROP INDEX IDX_547A1B34D18739DF ON storage');
        $this->addSql('ALTER TABLE storage DROP aep_id');
        $this->addSql('DROP INDEX IDX_68A52ECD18739DF ON water_traitment_analysis');
        $this->addSql('ALTER TABLE water_traitment_analysis DROP aep_id');
    }
}
