<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190613013040 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE consejero_superior (id VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE consejero_superior ADD CONSTRAINT FK_6A986AD2BF396750 FOREIGN KEY (id) REFERENCES actividad (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE consejeros_superiores');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE consejeros_superiores (id INT UNSIGNED AUTO_INCREMENT NOT NULL, periodo_inicial DATE NOT NULL, periodo_final DATE DEFAULT NULL, uuid CHAR(36) NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, created DATETIME NOT NULL, updated DATETIME NOT NULL, content_changed DATETIME DEFAULT NULL, deletedAt DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_924D08F3D17F50A6 (uuid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE consejero_superior');
    }
}
