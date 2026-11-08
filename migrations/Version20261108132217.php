<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261108132217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livre ALTER statut DROP NOT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_AC634F99FB88E14F ON livre (utilisateur_id)');
        $this->addSql('ALTER TABLE utilisateur ADD livre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B337D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_1D1C63B337D925CB ON utilisateur (livre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE livre DROP CONSTRAINT FK_AC634F99FB88E14F');
        $this->addSql('DROP INDEX IDX_AC634F99FB88E14F');
        $this->addSql('ALTER TABLE livre DROP utilisateur_id');
        $this->addSql('ALTER TABLE livre ALTER statut SET NOT NULL');
        $this->addSql('ALTER TABLE utilisateur DROP CONSTRAINT FK_1D1C63B337D925CB');
        $this->addSql('DROP INDEX IDX_1D1C63B337D925CB');
        $this->addSql('ALTER TABLE utilisateur DROP livre_id');
    }
}
