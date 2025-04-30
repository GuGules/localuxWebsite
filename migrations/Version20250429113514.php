<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250429113514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE vehicule ADD type_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DC54C8C93 FOREIGN KEY (type_id) REFERENCES type_vehicule (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_292FFF1DC54C8C93 ON vehicule (type_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DC54C8C93
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_292FFF1DC54C8C93 ON vehicule
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vehicule DROP type_id
        SQL);
    }
}
