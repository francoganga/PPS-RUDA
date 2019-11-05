<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191105230104 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE miembro_pps (id VARCHAR(255) NOT NULL, pps_id VARCHAR(255) DEFAULT NULL, INDEX IDX_E0220BA6A3B85FFD (pps_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pps (id VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE miembro_pps ADD CONSTRAINT FK_E0220BA6A3B85FFD FOREIGN KEY (pps_id) REFERENCES pps (id)');
        $this->addSql('ALTER TABLE miembro_pps ADD CONSTRAINT FK_E0220BA6BF396750 FOREIGN KEY (id) REFERENCES actividad (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE miembro_pps DROP FOREIGN KEY FK_E0220BA6A3B85FFD');
        $this->addSql('DROP TABLE miembro_pps');
        $this->addSql('DROP TABLE pps');
    }
}
