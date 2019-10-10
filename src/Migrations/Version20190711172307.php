<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190711172307 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE carrera (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE director_carrera (id VARCHAR(255) NOT NULL, carrera_id INT NOT NULL, UNIQUE INDEX UNIQ_1CA01E7FC671B40F (carrera_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE director_carrera ADD CONSTRAINT FK_1CA01E7FC671B40F FOREIGN KEY (carrera_id) REFERENCES carrera (id)');
        $this->addSql('ALTER TABLE director_carrera ADD CONSTRAINT FK_1CA01E7FBF396750 FOREIGN KEY (id) REFERENCES actividad (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE director_carrera DROP FOREIGN KEY FK_1CA01E7FC671B40F');
        $this->addSql('DROP TABLE carrera');
        $this->addSql('DROP TABLE director_carrera');
    }
}
