<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191105204212 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comision_consejo_superior_rol_ccs (comision_consejo_superior_id VARCHAR(255) NOT NULL, rol_ccs_id VARCHAR(255) NOT NULL, INDEX IDX_4E9FA5CD3FA79D26 (comision_consejo_superior_id), INDEX IDX_4E9FA5CD704D3C35 (rol_ccs_id), PRIMARY KEY(comision_consejo_superior_id, rol_ccs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rol_ccs (id VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comision_consejo_superior_rol_ccs ADD CONSTRAINT FK_4E9FA5CD3FA79D26 FOREIGN KEY (comision_consejo_superior_id) REFERENCES comision_consejo_superior (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comision_consejo_superior_rol_ccs ADD CONSTRAINT FK_4E9FA5CD704D3C35 FOREIGN KEY (rol_ccs_id) REFERENCES rol_ccs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE miembro_ccs ADD rol_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE miembro_ccs ADD CONSTRAINT FK_9FAD571D4BAB96C FOREIGN KEY (rol_id) REFERENCES rol_ccs (id)');
        $this->addSql('CREATE INDEX IDX_9FAD571D4BAB96C ON miembro_ccs (rol_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comision_consejo_superior_rol_ccs DROP FOREIGN KEY FK_4E9FA5CD704D3C35');
        $this->addSql('ALTER TABLE miembro_ccs DROP FOREIGN KEY FK_9FAD571D4BAB96C');
        $this->addSql('DROP TABLE comision_consejo_superior_rol_ccs');
        $this->addSql('DROP TABLE rol_ccs');
        $this->addSql('DROP INDEX IDX_9FAD571D4BAB96C ON miembro_ccs');
        $this->addSql('ALTER TABLE miembro_ccs DROP rol_id');
    }
}
