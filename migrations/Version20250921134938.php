<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250921134938 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE auteur ADD nom_prenom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE auteur DROP nom');
        $this->addSql('ALTER TABLE auteur DROP prenoms');
        $this->addSql('ALTER TABLE commentaire ALTER date_publication DROP NOT NULL');
        $this->addSql('ALTER TABLE editeur ADD nom_prenom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE editeur DROP nom');
        $this->addSql('ALTER TABLE editeur DROP prenoms');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE auteur ADD prenoms VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE auteur RENAME COLUMN nom_prenom TO nom');
        $this->addSql('ALTER TABLE commentaire ALTER date_publication SET NOT NULL');
        $this->addSql('ALTER TABLE editeur ADD prenoms VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE editeur RENAME COLUMN nom_prenom TO nom');
    }
}
