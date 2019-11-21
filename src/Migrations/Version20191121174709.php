<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191121174709 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE persona ADD id_mapuche INT NOT NULL, ADD id_guarani INT NOT NULL, DROP nombre, DROP apellido');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_51E5B69B156636B4 ON persona (id_mapuche)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_51E5B69BB56E903F ON persona (id_guarani)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_51E5B69B156636B4 ON persona');
        $this->addSql('DROP INDEX UNIQ_51E5B69BB56E903F ON persona');
        $this->addSql('ALTER TABLE persona ADD nombre VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD apellido VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP id_mapuche, DROP id_guarani');
    }
}
