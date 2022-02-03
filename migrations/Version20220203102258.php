<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203102258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartment (id INT AUTO_INCREMENT NOT NULL, building_id INT NOT NULL, number INT NOT NULL, INDEX IDX_CD632DF04D2A7E12 (building_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE building (id INT AUTO_INCREMENT NOT NULL, street_id INT NOT NULL, number INT NOT NULL, appartment_quantity INT NOT NULL, INDEX IDX_E16F61D487CF8EB (street_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE street (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appartment ADD CONSTRAINT FK_CD632DF04D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id)');
        $this->addSql('ALTER TABLE building ADD CONSTRAINT FK_E16F61D487CF8EB FOREIGN KEY (street_id) REFERENCES street (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartment DROP FOREIGN KEY FK_CD632DF04D2A7E12');
        $this->addSql('ALTER TABLE building DROP FOREIGN KEY FK_E16F61D487CF8EB');
        $this->addSql('DROP TABLE appartment');
        $this->addSql('DROP TABLE building');
        $this->addSql('DROP TABLE street');
        $this->addSql('ALTER TABLE book CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE book_category CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE car CHANGE number number VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
