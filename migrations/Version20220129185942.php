<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220129185942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ad (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, price_id INT DEFAULT NULL, country_id INT NOT NULL, city_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, post_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_active TINYINT(1) NOT NULL, updated_at DATETIME DEFAULT NULL, address LONGTEXT DEFAULT NULL, INDEX IDX_77E0ED587E3C61F9 (owner_id), UNIQUE INDEX UNIQ_77E0ED58D614C7E7 (price_id), INDEX IDX_77E0ED58F92F3E70 (country_id), INDEX IDX_77E0ED588BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ad_owner (id INT AUTO_INCREMENT NOT NULL, user VARCHAR(255) NOT NULL, phone_number VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price (id INT AUTO_INCREMENT NOT NULL, post_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', value BIGINT NOT NULL, currency_code VARCHAR(3) NOT NULL, ad VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED587E3C61F9 FOREIGN KEY (owner_id) REFERENCES ad_owner (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED58D614C7E7 FOREIGN KEY (price_id) REFERENCES price (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED58F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED588BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('DROP TABLE `add`');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED587E3C61F9');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED58D614C7E7');
        $this->addSql('CREATE TABLE `add` (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE ad');
        $this->addSql('DROP TABLE ad_owner');
        $this->addSql('DROP TABLE price');
        $this->addSql('DROP TABLE user');
    }
}
