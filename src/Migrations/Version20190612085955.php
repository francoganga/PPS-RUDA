<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190612085955 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actividad (id VARCHAR(255) NOT NULL, persona_id INT NOT NULL, inicio DATETIME NOT NULL, fin DATETIME DEFAULT NULL, discr VARCHAR(255) NOT NULL, INDEX IDX_8DF2BD06F5F88DB9 (persona_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE director_instituto (id VARCHAR(255) NOT NULL, instituto_id INT NOT NULL, INDEX IDX_42BB5FD46C6EF28 (instituto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE persona (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instituto (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actividad ADD CONSTRAINT FK_8DF2BD06F5F88DB9 FOREIGN KEY (persona_id) REFERENCES persona (id)');
        $this->addSql('ALTER TABLE director_instituto ADD CONSTRAINT FK_42BB5FD46C6EF28 FOREIGN KEY (instituto_id) REFERENCES instituto (id)');
        $this->addSql('ALTER TABLE director_instituto ADD CONSTRAINT FK_42BB5FD4BF396750 FOREIGN KEY (id) REFERENCES actividad (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE asambleista CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE director_instituto DROP FOREIGN KEY FK_42BB5FD4BF396750');
        $this->addSql('ALTER TABLE actividad DROP FOREIGN KEY FK_8DF2BD06F5F88DB9');
        $this->addSql('ALTER TABLE director_instituto DROP FOREIGN KEY FK_42BB5FD46C6EF28');
        $this->addSql('DROP TABLE actividad');
        $this->addSql('DROP TABLE director_instituto');
        $this->addSql('DROP TABLE persona');
        $this->addSql('DROP TABLE instituto');
        $this->addSql('ALTER TABLE asambleista CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }
}
