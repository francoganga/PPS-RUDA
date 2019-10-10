<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190610230102 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE asambleista ADD uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B4E70F6ED17F50A6 ON asambleista (uuid)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE asambleista MODIFY id INT UNSIGNED NOT NULL');
        $this->addSql('DROP INDEX UNIQ_B4E70F6ED17F50A6 ON asambleista');
        $this->addSql('ALTER TABLE asambleista DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE asambleista DROP id, DROP uuid');
    }
}
