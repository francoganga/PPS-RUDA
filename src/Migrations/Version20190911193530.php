<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190911193530 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE rol_proyecto (id VARCHAR(255) NOT NULL, proyecto_id VARCHAR(255) DEFAULT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_1C480C73F625D1BA (proyecto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rol_proyecto ADD CONSTRAINT FK_1C480C73F625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE miembro_proyecto ADD rol_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE miembro_proyecto ADD CONSTRAINT FK_4C8D984C4BAB96C FOREIGN KEY (rol_id) REFERENCES rol_proyecto (id)');
        $this->addSql('CREATE INDEX IDX_4C8D984C4BAB96C ON miembro_proyecto (rol_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE miembro_proyecto DROP FOREIGN KEY FK_4C8D984C4BAB96C');
        $this->addSql('DROP TABLE rol_proyecto');
        $this->addSql('DROP INDEX IDX_4C8D984C4BAB96C ON miembro_proyecto');
        $this->addSql('ALTER TABLE miembro_proyecto DROP rol_id');
    }
}
