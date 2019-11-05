<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191024200027 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE rol_proyecto (id VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rol_proyecto_proyecto (rol_proyecto_id VARCHAR(255) NOT NULL, proyecto_id VARCHAR(255) NOT NULL, INDEX IDX_DC635478E444958B (rol_proyecto_id), INDEX IDX_DC635478F625D1BA (proyecto_id), PRIMARY KEY(rol_proyecto_id, proyecto_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rol_proyecto_proyecto ADD CONSTRAINT FK_DC635478E444958B FOREIGN KEY (rol_proyecto_id) REFERENCES rol_proyecto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rol_proyecto_proyecto ADD CONSTRAINT FK_DC635478F625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actividad CHANGE fin fin DATE DEFAULT NULL, CHANGE deleted_at deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE coordinador_materia ADD materia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE coordinador_materia ADD CONSTRAINT FK_21C2D087B54DBBCB FOREIGN KEY (materia_id) REFERENCES materia (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_21C2D087B54DBBCB ON coordinador_materia (materia_id)');
        $this->addSql('ALTER TABLE materia DROP FOREIGN KEY FK_6DF05284E4517BDD');
        $this->addSql('DROP INDEX IDX_6DF05284E4517BDD ON materia');
        $this->addSql('ALTER TABLE materia DROP coordinador_id');
        $this->addSql('ALTER TABLE miembro_proyecto ADD rol_id VARCHAR(255) DEFAULT NULL, CHANGE proyecto_id proyecto_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE miembro_proyecto ADD CONSTRAINT FK_4C8D984C4BAB96C FOREIGN KEY (rol_id) REFERENCES rol_proyecto (id)');
        $this->addSql('CREATE INDEX IDX_4C8D984C4BAB96C ON miembro_proyecto (rol_id)');
        $this->addSql('ALTER TABLE fos_user_user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE date_of_birth date_of_birth DATETIME DEFAULT NULL, CHANGE firstname firstname VARCHAR(64) DEFAULT NULL, CHANGE lastname lastname VARCHAR(64) DEFAULT NULL, CHANGE website website VARCHAR(64) DEFAULT NULL, CHANGE biography biography VARCHAR(1000) DEFAULT NULL, CHANGE gender gender VARCHAR(1) DEFAULT NULL, CHANGE locale locale VARCHAR(8) DEFAULT NULL, CHANGE timezone timezone VARCHAR(64) DEFAULT NULL, CHANGE phone phone VARCHAR(64) DEFAULT NULL, CHANGE facebook_uid facebook_uid VARCHAR(255) DEFAULT NULL, CHANGE facebook_name facebook_name VARCHAR(255) DEFAULT NULL, CHANGE facebook_data facebook_data JSON DEFAULT NULL, CHANGE twitter_uid twitter_uid VARCHAR(255) DEFAULT NULL, CHANGE twitter_name twitter_name VARCHAR(255) DEFAULT NULL, CHANGE twitter_data twitter_data JSON DEFAULT NULL, CHANGE gplus_uid gplus_uid VARCHAR(255) DEFAULT NULL, CHANGE gplus_name gplus_name VARCHAR(255) DEFAULT NULL, CHANGE gplus_data gplus_data JSON DEFAULT NULL, CHANGE token token VARCHAR(255) DEFAULT NULL, CHANGE two_step_code two_step_code VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE rol_proyecto_proyecto DROP FOREIGN KEY FK_DC635478E444958B');
        $this->addSql('ALTER TABLE miembro_proyecto DROP FOREIGN KEY FK_4C8D984C4BAB96C');
        $this->addSql('DROP TABLE rol_proyecto');
        $this->addSql('DROP TABLE rol_proyecto_proyecto');
        $this->addSql('ALTER TABLE actividad CHANGE fin fin DATE DEFAULT NULL, CHANGE deleted_at deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE coordinador_materia DROP FOREIGN KEY FK_21C2D087B54DBBCB');
        $this->addSql('DROP INDEX UNIQ_21C2D087B54DBBCB ON coordinador_materia');
        $this->addSql('ALTER TABLE coordinador_materia DROP materia_id');
        $this->addSql('ALTER TABLE fos_user_user CHANGE salt salt VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE date_of_birth date_of_birth DATETIME DEFAULT NULL, CHANGE firstname firstname VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE lastname lastname VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE website website VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE biography biography VARCHAR(1000) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE gender gender VARCHAR(1) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE locale locale VARCHAR(8) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE timezone timezone VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE phone phone VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE facebook_uid facebook_uid VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE facebook_name facebook_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE facebook_data facebook_data LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, CHANGE twitter_uid twitter_uid VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE twitter_name twitter_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE twitter_data twitter_data LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, CHANGE gplus_uid gplus_uid VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE gplus_name gplus_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE gplus_data gplus_data LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, CHANGE token token VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE two_step_code two_step_code VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE materia ADD coordinador_id VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE materia ADD CONSTRAINT FK_6DF05284E4517BDD FOREIGN KEY (coordinador_id) REFERENCES coordinador_materia (id)');
        $this->addSql('CREATE INDEX IDX_6DF05284E4517BDD ON materia (coordinador_id)');
        $this->addSql('DROP INDEX IDX_4C8D984C4BAB96C ON miembro_proyecto');
        $this->addSql('ALTER TABLE miembro_proyecto DROP rol_id, CHANGE proyecto_id proyecto_id VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
