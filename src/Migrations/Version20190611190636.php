<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190611190636 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE asambleista ADD created DATETIME NOT NULL, ADD updated DATETIME NOT NULL, ADD content_changed DATETIME DEFAULT NULL, CHANGE periodo_inicio periodo_inicial DATE NOT NULL');
        $this->addSql('ALTER TABLE consejeros_superiores ADD created DATETIME NOT NULL, ADD updated DATETIME NOT NULL, ADD content_changed DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE asambleista DROP created, DROP updated, DROP content_changed, CHANGE periodo_inicial periodo_inicio DATE NOT NULL');
        $this->addSql('ALTER TABLE consejeros_superiores DROP created, DROP updated, DROP content_changed');
    }
}
