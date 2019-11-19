<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191116220306 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE miembro_actividad_divulgacion (id VARCHAR(255) NOT NULL, actividad_divulgacion_id VARCHAR(255) DEFAULT NULL, INDEX IDX_727704564F7E7F92 (actividad_divulgacion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actividad_divulgacion (id VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE miembro_actividad_divulgacion ADD CONSTRAINT FK_727704564F7E7F92 FOREIGN KEY (actividad_divulgacion_id) REFERENCES actividad_divulgacion (id)');
        $this->addSql('ALTER TABLE miembro_actividad_divulgacion ADD CONSTRAINT FK_72770456BF396750 FOREIGN KEY (id) REFERENCES actividad (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE miembro_actividad_divulgacion DROP FOREIGN KEY FK_727704564F7E7F92');
        $this->addSql('DROP TABLE miembro_actividad_divulgacion');
        $this->addSql('DROP TABLE actividad_divulgacion');
    }
}
