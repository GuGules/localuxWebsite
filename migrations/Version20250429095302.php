<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250429095302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE vehicule_parties_vehicules (vehicule_id INT NOT NULL, parties_vehicules_id INT NOT NULL, INDEX IDX_817EE84A4A4A3511 (vehicule_id), INDEX IDX_817EE84A7C50D1C0 (parties_vehicules_id), PRIMARY KEY(vehicule_id, parties_vehicules_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vehicule_parties_vehicules ADD CONSTRAINT FK_817EE84A4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vehicule_parties_vehicules ADD CONSTRAINT FK_817EE84A7C50D1C0 FOREIGN KEY (parties_vehicules_id) REFERENCES parties_vehicules (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE vehicule_parties_vehicules DROP FOREIGN KEY FK_817EE84A4A4A3511
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vehicule_parties_vehicules DROP FOREIGN KEY FK_817EE84A7C50D1C0
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE vehicule_parties_vehicules
        SQL);
    }
}
