<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220130030639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE INDEX IDX_2D5B02345E237E06989D9B6224A798E01B498947 ON city (name, slug, coord_lat, coord_long)');
        $this->addSql('CREATE INDEX IDX_5373C9665E237E06C6F08EFA989D9B629411628A6956883F ON country (name, name_native, slug, phone_code, currency)');
        $this->addSql('CREATE INDEX IDX_1ACC766E5E237E06 ON make (name)');
        $this->addSql('CREATE INDEX IDX_F62F1765E237E06989D9B62 ON region (name, slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_2D5B02345E237E06989D9B6224A798E01B498947 ON city');
        $this->addSql('DROP INDEX IDX_5373C9665E237E06C6F08EFA989D9B629411628A6956883F ON country');
        $this->addSql('DROP INDEX IDX_1ACC766E5E237E06 ON make');
        $this->addSql('DROP INDEX IDX_F62F1765E237E06989D9B62 ON region');
    }
}
