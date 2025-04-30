<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250429065353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE formule DROP FOREIGN KEY FK_605C9C98804424C1
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_605C9C98804424C1 ON formule
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE formule DROP sans_chauffeur_id
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE formule ADD sans_chauffeur_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE formule ADD CONSTRAINT FK_605C9C98804424C1 FOREIGN KEY (sans_chauffeur_id) REFERENCES reservation (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_605C9C98804424C1 ON formule (sans_chauffeur_id)
        SQL);
    }
}
