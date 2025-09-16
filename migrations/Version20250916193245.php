<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250916193245 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auteur (id SERIAL NOT NULL, nom VARCHAR(255) NOT NULL, prenoms VARCHAR(255) NOT NULL, date_naissance TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_deces TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, nationalite VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN auteur.date_naissance IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN auteur.date_deces IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE commentaire (id SERIAL NOT NULL, livre_id INT NOT NULL, nom_auteur VARCHAR(255) NOT NULL, mail_auteur VARCHAR(255) NOT NULL, date_creation TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_publication TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, statut VARCHAR(255) NOT NULL, contenu VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_67F068BC37D925CB ON commentaire (livre_id)');
        $this->addSql('COMMENT ON COLUMN commentaire.date_creation IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN commentaire.date_publication IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE livre (id SERIAL NOT NULL, editeur_id INT NOT NULL, titre VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, numero_isbn VARCHAR(255) NOT NULL, date_sortie TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, nombre_pages INT NOT NULL, synopsis VARCHAR(500) NOT NULL, statut VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_AC634F993375BD21 ON livre (editeur_id)');
        $this->addSql('COMMENT ON COLUMN livre.date_sortie IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE livre_auteur (livre_id INT NOT NULL, auteur_id INT NOT NULL, PRIMARY KEY(livre_id, auteur_id))');
        $this->addSql('CREATE INDEX IDX_A11876B537D925CB ON livre_auteur (livre_id)');
        $this->addSql('CREATE INDEX IDX_A11876B560BB6FE6 ON livre_auteur (auteur_id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F993375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE livre_auteur ADD CONSTRAINT FK_A11876B537D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE livre_auteur ADD CONSTRAINT FK_A11876B560BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT FK_67F068BC37D925CB');
        $this->addSql('ALTER TABLE livre DROP CONSTRAINT FK_AC634F993375BD21');
        $this->addSql('ALTER TABLE livre_auteur DROP CONSTRAINT FK_A11876B537D925CB');
        $this->addSql('ALTER TABLE livre_auteur DROP CONSTRAINT FK_A11876B560BB6FE6');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE livre_auteur');
    }
}
