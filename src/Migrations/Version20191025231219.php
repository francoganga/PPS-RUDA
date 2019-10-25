<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191025231219 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on mysql.');

        $this->addSql('CREATE TABLE proyecto_rol_proyecto (proyecto_id VARCHAR(255) NOT NULL, rol_proyecto_id VARCHAR(255) NOT NULL, INDEX IDX_FD713C12F625D1BA (proyecto_id), INDEX IDX_FD713C12E444958B (rol_proyecto_id), PRIMARY KEY(proyecto_id, rol_proyecto_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE proyecto_rol_proyecto ADD CONSTRAINT FK_FD713C12F625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proyecto_rol_proyecto ADD CONSTRAINT FK_FD713C12E444958B FOREIGN KEY (rol_proyecto_id) REFERENCES rol_proyecto (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE rol_proyecto_proyecto');
        $this->addSql('ALTER TABLE actividad CHANGE fin fin DATE DEFAULT NULL, CHANGE deleted_at deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE coordinador_materia CHANGE materia_id materia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE miembro_proyecto CHANGE proyecto_id proyecto_id VARCHAR(255) DEFAULT NULL, CHANGE rol_id rol_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user_user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE date_of_birth date_of_birth DATETIME DEFAULT NULL, CHANGE firstname firstname VARCHAR(64) DEFAULT NULL, CHANGE lastname lastname VARCHAR(64) DEFAULT NULL, CHANGE website website VARCHAR(64) DEFAULT NULL, CHANGE biography biography VARCHAR(1000) DEFAULT NULL, CHANGE gender gender VARCHAR(1) DEFAULT NULL, CHANGE locale locale VARCHAR(8) DEFAULT NULL, CHANGE timezone timezone VARCHAR(64) DEFAULT NULL, CHANGE phone phone VARCHAR(64) DEFAULT NULL, CHANGE facebook_uid facebook_uid VARCHAR(255) DEFAULT NULL, CHANGE facebook_name facebook_name VARCHAR(255) DEFAULT NULL, CHANGE facebook_data facebook_data JSON DEFAULT NULL, CHANGE twitter_uid twitter_uid VARCHAR(255) DEFAULT NULL, CHANGE twitter_name twitter_name VARCHAR(255) DEFAULT NULL, CHANGE twitter_data twitter_data JSON DEFAULT NULL, CHANGE gplus_uid gplus_uid VARCHAR(255) DEFAULT NULL, CHANGE gplus_name gplus_name VARCHAR(255) DEFAULT NULL, CHANGE gplus_data gplus_data JSON DEFAULT NULL, CHANGE token token VARCHAR(255) DEFAULT NULL, CHANGE two_step_code two_step_code VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on mysql.');

        $this->addSql('CREATE TABLE rol_proyecto_proyecto (rol_proyecto_id VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, proyecto_id VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_DC635478E444958B (rol_proyecto_id), INDEX IDX_DC635478F625D1BA (proyecto_id), PRIMARY KEY(rol_proyecto_id, proyecto_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT =  ');
        $this->addSql('ALTER TABLE rol_proyecto_proyecto ADD CONSTRAINT FK_DC635478E444958B FOREIGN KEY (rol_proyecto_id) REFERENCES rol_proyecto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rol_proyecto_proyecto ADD CONSTRAINT FK_DC635478F625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE proyecto_rol_proyecto');
        $this->addSql('ALTER TABLE actividad CHANGE fin fin DATE DEFAULT NULL, CHANGE deleted_at deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE coordinador_materia CHANGE materia_id materia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user_user CHANGE salt salt VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE date_of_birth date_of_birth DATETIME DEFAULT NULL, CHANGE firstname firstname VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE lastname lastname VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE website website VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE biography biography VARCHAR(1000) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE gender gender VARCHAR(1) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE locale locale VARCHAR(8) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE timezone timezone VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE phone phone VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE facebook_uid facebook_uid VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE facebook_name facebook_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE facebook_data facebook_data LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, CHANGE twitter_uid twitter_uid VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE twitter_name twitter_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE twitter_data twitter_data LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, CHANGE gplus_uid gplus_uid VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE gplus_name gplus_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE gplus_data gplus_data LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, CHANGE token token VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE two_step_code two_step_code VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE miembro_proyecto CHANGE proyecto_id proyecto_id VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE rol_id rol_id VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
