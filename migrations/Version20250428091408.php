<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250428091408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE chauffeur (id INT AUTO_INCREMENT NOT NULL, trajet_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, numero_permis VARCHAR(255) DEFAULT NULL, INDEX IDX_5CA777B8D12A823 (trajet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE trajet (id INT AUTO_INCREMENT NOT NULL, ville_depart VARCHAR(255) NOT NULL, ville_destination VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE chauffeur ADD CONSTRAINT FK_5CA777B8D12A823 FOREIGN KEY (trajet_id) REFERENCES trajet (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD chauffeur_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT FK_42C8495585C0B3BE FOREIGN KEY (chauffeur_id) REFERENCES chauffeur (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_42C8495585C0B3BE ON reservation (chauffeur_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495585C0B3BE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE chauffeur DROP FOREIGN KEY FK_5CA777B8D12A823
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE chauffeur
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE trajet
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_42C8495585C0B3BE ON reservation
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP chauffeur_id
        SQL);
    }
}
