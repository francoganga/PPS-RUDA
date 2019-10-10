<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190711184830 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE coordinador_materia (id VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materia (id INT AUTO_INCREMENT NOT NULL, coordinador_id VARCHAR(255) DEFAULT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_6DF05284E4517BDD (coordinador_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coordinador_materia ADD CONSTRAINT FK_21C2D087BF396750 FOREIGN KEY (id) REFERENCES actividad (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE materia ADD CONSTRAINT FK_6DF05284E4517BDD FOREIGN KEY (coordinador_id) REFERENCES coordinador_materia (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE materia DROP FOREIGN KEY FK_6DF05284E4517BDD');
        $this->addSql('DROP TABLE coordinador_materia');
        $this->addSql('DROP TABLE materia');
    }
}
