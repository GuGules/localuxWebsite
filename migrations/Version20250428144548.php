<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250428144548 extends AbstractMigration
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
            CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, password VARCHAR(255) NOT NULL, cookie_consent TINYINT(1) DEFAULT NULL, login VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, gdpr TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE formule (id INT AUTO_INCREMENT NOT NULL, sans_chauffeur_id INT DEFAULT NULL, lib VARCHAR(255) NOT NULL, duree TIME NOT NULL, nb_kms INT NOT NULL, INDEX IDX_605C9C98804424C1 (sans_chauffeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE log (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date_log DATE NOT NULL, action VARCHAR(255) NOT NULL, INDEX IDX_8F3F68C5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE partie_endommagee (id INT AUTO_INCREMENT NOT NULL, partie_id INT NOT NULL, etat VARCHAR(255) NOT NULL, INDEX IDX_1127936E075F7A4 (partie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE parties_vehicules (id INT AUTO_INCREMENT NOT NULL, lib VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE parties_vehicules_type_vehicule (parties_vehicules_id INT NOT NULL, type_vehicule_id INT NOT NULL, INDEX IDX_BAC6A5E07C50D1C0 (parties_vehicules_id), INDEX IDX_BAC6A5E0153E280 (type_vehicule_id), PRIMARY KEY(parties_vehicules_id, type_vehicule_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, chauffeur_id INT DEFAULT NULL, formule_id INT DEFAULT NULL, date_depart DATE NOT NULL, date_retour DATE DEFAULT NULL, kms_effectues INT DEFAULT NULL, type VARCHAR(255) NOT NULL, duree TIME DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, INDEX IDX_42C8495519EB6921 (client_id), INDEX IDX_42C8495585C0B3BE (chauffeur_id), INDEX IDX_42C849552A68F4D1 (formule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE salarie (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, date_modif DATE NOT NULL, login VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE trajet (id INT AUTO_INCREMENT NOT NULL, ville_depart VARCHAR(255) NOT NULL, ville_destination VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE type_vehicule (id INT AUTO_INCREMENT NOT NULL, lib VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, immat VARCHAR(9) NOT NULL, kilometrage INT NOT NULL, date_ct DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE chauffeur ADD CONSTRAINT FK_5CA777B8D12A823 FOREIGN KEY (trajet_id) REFERENCES trajet (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE formule ADD CONSTRAINT FK_605C9C98804424C1 FOREIGN KEY (sans_chauffeur_id) REFERENCES reservation (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log ADD CONSTRAINT FK_8F3F68C5A76ED395 FOREIGN KEY (user_id) REFERENCES salarie (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE partie_endommagee ADD CONSTRAINT FK_1127936E075F7A4 FOREIGN KEY (partie_id) REFERENCES parties_vehicules (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE parties_vehicules_type_vehicule ADD CONSTRAINT FK_BAC6A5E07C50D1C0 FOREIGN KEY (parties_vehicules_id) REFERENCES parties_vehicules (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE parties_vehicules_type_vehicule ADD CONSTRAINT FK_BAC6A5E0153E280 FOREIGN KEY (type_vehicule_id) REFERENCES type_vehicule (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT FK_42C8495585C0B3BE FOREIGN KEY (chauffeur_id) REFERENCES chauffeur (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT FK_42C849552A68F4D1 FOREIGN KEY (formule_id) REFERENCES formule (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE chauffeur DROP FOREIGN KEY FK_5CA777B8D12A823
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE formule DROP FOREIGN KEY FK_605C9C98804424C1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE log DROP FOREIGN KEY FK_8F3F68C5A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE partie_endommagee DROP FOREIGN KEY FK_1127936E075F7A4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE parties_vehicules_type_vehicule DROP FOREIGN KEY FK_BAC6A5E07C50D1C0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE parties_vehicules_type_vehicule DROP FOREIGN KEY FK_BAC6A5E0153E280
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495585C0B3BE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY FK_42C849552A68F4D1
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE chauffeur
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE client
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE formule
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE log
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE partie_endommagee
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE parties_vehicules
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE parties_vehicules_type_vehicule
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE reservation
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE salarie
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE trajet
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE type_vehicule
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE vehicule
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
