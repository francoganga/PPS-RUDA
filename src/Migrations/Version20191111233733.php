<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191111233733 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE miembro_actividad_divulgacion (id VARCHAR(255) NOT NULL, actividad_divulgacion_id VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_727704564F7E7F92 (actividad_divulgacion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actividad_divulgacion (id VARCHAR(255) NOT NULL, miembro_id VARCHAR(255) DEFAULT NULL, nombre VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BC02159A7952B53A (miembro_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE miembro_actividad_divulgacion ADD CONSTRAINT FK_727704564F7E7F92 FOREIGN KEY (actividad_divulgacion_id) REFERENCES miembro_actividad_divulgacion (id)');
        $this->addSql('ALTER TABLE miembro_actividad_divulgacion ADD CONSTRAINT FK_72770456BF396750 FOREIGN KEY (id) REFERENCES actividad (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actividad_divulgacion ADD CONSTRAINT FK_BC02159A7952B53A FOREIGN KEY (miembro_id) REFERENCES miembro_actividad_divulgacion (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE miembro_actividad_divulgacion DROP FOREIGN KEY FK_727704564F7E7F92');
        $this->addSql('ALTER TABLE actividad_divulgacion DROP FOREIGN KEY FK_BC02159A7952B53A');
        $this->addSql('DROP TABLE miembro_actividad_divulgacion');
        $this->addSql('DROP TABLE actividad_divulgacion');
    }
}
