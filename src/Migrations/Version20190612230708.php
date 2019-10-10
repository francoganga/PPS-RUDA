<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190612230708 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_B4E70F6ED17F50A6 ON asambleista');
        $this->addSql('ALTER TABLE asambleista DROP periodo_inicial, DROP periodo_final, DROP name, DROP uuid, DROP created, DROP updated, DROP content_changed, DROP deletedAt, CHANGE id id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE asambleista ADD CONSTRAINT FK_B4E70F6EBF396750 FOREIGN KEY (id) REFERENCES actividad (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE asambleista DROP FOREIGN KEY FK_B4E70F6EBF396750');
        $this->addSql('ALTER TABLE asambleista ADD periodo_inicial DATE NOT NULL, ADD periodo_final DATE DEFAULT NULL, ADD name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD uuid CHAR(36) NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\', ADD created DATETIME NOT NULL, ADD updated DATETIME NOT NULL, ADD content_changed DATETIME DEFAULT NULL, ADD deletedAt DATETIME DEFAULT NULL, CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B4E70F6ED17F50A6 ON asambleista (uuid)');
    }
}
