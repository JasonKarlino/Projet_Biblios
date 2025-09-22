<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250921141042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE auteur RENAME COLUMN nomPrenom TO nom_prenom');
        $this->addSql('ALTER TABLE commentaire ALTER date_publication DROP NOT NULL');
        $this->addSql('ALTER TABLE editeur RENAME COLUMN nomPrenom TO nom_prenom');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE auteur RENAME COLUMN nom_prenom TO "nomPrenom"');
        $this->addSql('ALTER TABLE commentaire ALTER date_publication SET NOT NULL');
        $this->addSql('ALTER TABLE editeur RENAME COLUMN nom_prenom TO "nomPrenom"');
    }
}
