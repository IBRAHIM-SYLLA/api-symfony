<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221129122624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315E7A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE utilisateurs RENAME INDEX uniq_8d93d649e7927c74 TO UNIQ_497B315EE7927C74');
        $this->addSql('ALTER TABLE utilisateurs RENAME INDEX idx_8d93d649cc064c08 TO IDX_497B315E7A45358C');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315E7A45358C');
        $this->addSql('ALTER TABLE utilisateurs RENAME INDEX idx_497b315e7a45358c TO IDX_8D93D649CC064C08');
        $this->addSql('ALTER TABLE utilisateurs RENAME INDEX uniq_497b315ee7927c74 TO UNIQ_8D93D649E7927C74');
    }
}
