<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200520184417 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE drilling_pmh ADD aep_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE drilling_pmh ADD CONSTRAINT FK_B549D5B1D18739DF FOREIGN KEY (aep_id) REFERENCES aep (id)');
        $this->addSql('CREATE INDEX IDX_B549D5B1D18739DF ON drilling_pmh (aep_id)');
        $this->addSql('ALTER TABLE improve_source_equipment_type ADD aep_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE improve_source_equipment_type ADD CONSTRAINT FK_AFAFC82D18739DF FOREIGN KEY (aep_id) REFERENCES aep (id)');
        $this->addSql('CREATE INDEX IDX_AFAFC82D18739DF ON improve_source_equipment_type (aep_id)');
        $this->addSql('ALTER TABLE storage CHANGE aep_id aep_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE traditional_well_equipment_type ADD aep_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE traditional_well_equipment_type ADD CONSTRAINT FK_AD911FB5D18739DF FOREIGN KEY (aep_id) REFERENCES aep (id)');
        $this->addSql('CREATE INDEX IDX_AD911FB5D18739DF ON traditional_well_equipment_type (aep_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE drilling_pmh DROP FOREIGN KEY FK_B549D5B1D18739DF');
        $this->addSql('DROP INDEX IDX_B549D5B1D18739DF ON drilling_pmh');
        $this->addSql('ALTER TABLE drilling_pmh DROP aep_id');
        $this->addSql('ALTER TABLE improve_source_equipment_type DROP FOREIGN KEY FK_AFAFC82D18739DF');
        $this->addSql('DROP INDEX IDX_AFAFC82D18739DF ON improve_source_equipment_type');
        $this->addSql('ALTER TABLE improve_source_equipment_type DROP aep_id');
        $this->addSql('ALTER TABLE storage CHANGE aep_id aep_id INT NOT NULL');
        $this->addSql('ALTER TABLE traditional_well_equipment_type DROP FOREIGN KEY FK_AD911FB5D18739DF');
        $this->addSql('DROP INDEX IDX_AD911FB5D18739DF ON traditional_well_equipment_type');
        $this->addSql('ALTER TABLE traditional_well_equipment_type DROP aep_id');
    }
}
