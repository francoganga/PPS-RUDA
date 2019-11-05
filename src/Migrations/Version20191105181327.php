<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191105181327 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comision_consejo_superior (id VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE miembro_ccs (id VARCHAR(255) NOT NULL, comision_consejo_superior_id VARCHAR(255) DEFAULT NULL, resolucion_administrativa_id VARCHAR(255) DEFAULT NULL, INDEX IDX_9FAD571D3FA79D26 (comision_consejo_superior_id), UNIQUE INDEX UNIQ_9FAD571D7F7519A5 (resolucion_administrativa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resolucion_administrativa (id VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE miembro_ccs ADD CONSTRAINT FK_9FAD571D3FA79D26 FOREIGN KEY (comision_consejo_superior_id) REFERENCES comision_consejo_superior (id)');
        $this->addSql('ALTER TABLE miembro_ccs ADD CONSTRAINT FK_9FAD571D7F7519A5 FOREIGN KEY (resolucion_administrativa_id) REFERENCES resolucion_administrativa (id)');
        $this->addSql('ALTER TABLE miembro_ccs ADD CONSTRAINT FK_9FAD571DBF396750 FOREIGN KEY (id) REFERENCES actividad (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE miembro_ccs DROP FOREIGN KEY FK_9FAD571D3FA79D26');
        $this->addSql('ALTER TABLE miembro_ccs DROP FOREIGN KEY FK_9FAD571D7F7519A5');
        $this->addSql('DROP TABLE comision_consejo_superior');
        $this->addSql('DROP TABLE miembro_ccs');
        $this->addSql('DROP TABLE resolucion_administrativa');
    }
}
