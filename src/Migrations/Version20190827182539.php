<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190827182539 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE miembro_proyecto (id VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE miembro_proyecto_rol (id INT AUTO_INCREMENT NOT NULL, miembro_id VARCHAR(255) DEFAULT NULL, proyecto_id VARCHAR(255) DEFAULT NULL, rol_id VARCHAR(255) DEFAULT NULL, INDEX IDX_90BBC3BD7952B53A (miembro_id), INDEX IDX_90BBC3BDF625D1BA (proyecto_id), INDEX IDX_90BBC3BD4BAB96C (rol_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proyecto (id VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proyecto_extension (id VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proyecto_investigacion (id VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rol_proyecto (id VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE miembro_proyecto ADD CONSTRAINT FK_4C8D984CBF396750 FOREIGN KEY (id) REFERENCES actividad (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE miembro_proyecto_rol ADD CONSTRAINT FK_90BBC3BD7952B53A FOREIGN KEY (miembro_id) REFERENCES miembro_proyecto (id)');
        $this->addSql('ALTER TABLE miembro_proyecto_rol ADD CONSTRAINT FK_90BBC3BDF625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE miembro_proyecto_rol ADD CONSTRAINT FK_90BBC3BD4BAB96C FOREIGN KEY (rol_id) REFERENCES rol_proyecto (id)');
        $this->addSql('ALTER TABLE proyecto_extension ADD CONSTRAINT FK_B7F85972BF396750 FOREIGN KEY (id) REFERENCES proyecto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proyecto_investigacion ADD CONSTRAINT FK_343F8D7EBF396750 FOREIGN KEY (id) REFERENCES proyecto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actividad CHANGE inicio inicio DATE NOT NULL, CHANGE fin fin DATE DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE miembro_proyecto_rol DROP FOREIGN KEY FK_90BBC3BD7952B53A');
        $this->addSql('ALTER TABLE miembro_proyecto_rol DROP FOREIGN KEY FK_90BBC3BDF625D1BA');
        $this->addSql('ALTER TABLE proyecto_extension DROP FOREIGN KEY FK_B7F85972BF396750');
        $this->addSql('ALTER TABLE proyecto_investigacion DROP FOREIGN KEY FK_343F8D7EBF396750');
        $this->addSql('ALTER TABLE miembro_proyecto_rol DROP FOREIGN KEY FK_90BBC3BD4BAB96C');
        $this->addSql('DROP TABLE miembro_proyecto');
        $this->addSql('DROP TABLE miembro_proyecto_rol');
        $this->addSql('DROP TABLE proyecto');
        $this->addSql('DROP TABLE proyecto_extension');
        $this->addSql('DROP TABLE proyecto_investigacion');
        $this->addSql('DROP TABLE rol_proyecto');
        $this->addSql('ALTER TABLE actividad CHANGE inicio inicio DATETIME NOT NULL, CHANGE fin fin DATETIME DEFAULT NULL');
    }
}
