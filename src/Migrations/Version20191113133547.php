<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191113133547 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE miembro_voluntariado (id VARCHAR(255) NOT NULL, voluntariado_id VARCHAR(255) DEFAULT NULL, INDEX IDX_9242EBAE1280C7C2 (voluntariado_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voluntariado (id VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE miembro_voluntariado ADD CONSTRAINT FK_9242EBAE1280C7C2 FOREIGN KEY (voluntariado_id) REFERENCES voluntariado (id)');
        $this->addSql('ALTER TABLE miembro_voluntariado ADD CONSTRAINT FK_9242EBAEBF396750 FOREIGN KEY (id) REFERENCES actividad (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE miembro_voluntariado DROP FOREIGN KEY FK_9242EBAE1280C7C2');
        $this->addSql('DROP TABLE miembro_voluntariado');
        $this->addSql('DROP TABLE voluntariado');
    }
}
