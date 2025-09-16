<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250916160321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE livre_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE auteur_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE commentaire_id_seq CASCADE');
        $this->addSql('ALTER TABLE auteur_livre DROP CONSTRAINT fk_a6dfa5e037d925cb');
        $this->addSql('ALTER TABLE auteur_livre DROP CONSTRAINT fk_a6dfa5e060bb6fe6');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT fk_67f068bc37d925cb');
        $this->addSql('ALTER TABLE livre DROP CONSTRAINT fk_ac634f993375bd21');
        $this->addSql('DROP TABLE auteur_livre');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE livre');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE livre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE auteur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE commentaire_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE auteur_livre (auteur_id INT NOT NULL, livre_id INT NOT NULL, PRIMARY KEY(auteur_id, livre_id))');
        $this->addSql('CREATE INDEX idx_a6dfa5e037d925cb ON auteur_livre (livre_id)');
        $this->addSql('CREATE INDEX idx_a6dfa5e060bb6fe6 ON auteur_livre (auteur_id)');
        $this->addSql('CREATE TABLE auteur (id SERIAL NOT NULL, nom VARCHAR(255) NOT NULL, prenoms VARCHAR(255) NOT NULL, date_naissance TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_deces TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, nationalite VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN auteur.date_naissance IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN auteur.date_deces IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE commentaire (id SERIAL NOT NULL, livre_id INT NOT NULL, nom_auteur VARCHAR(255) NOT NULL, mail_auteur VARCHAR(255) NOT NULL, date_creation TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_publication TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, contenu VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_67f068bc37d925cb ON commentaire (livre_id)');
        $this->addSql('COMMENT ON COLUMN commentaire.date_creation IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN commentaire.date_publication IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE livre (id SERIAL NOT NULL, editeur_id INT NOT NULL, titre VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, numero_isbn VARCHAR(255) NOT NULL, date_sortie TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, nombre_pages INT NOT NULL, synopsis VARCHAR(500) NOT NULL, statut VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_ac634f993375bd21 ON livre (editeur_id)');
        $this->addSql('COMMENT ON COLUMN livre.date_sortie IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE auteur_livre ADD CONSTRAINT fk_a6dfa5e037d925cb FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE auteur_livre ADD CONSTRAINT fk_a6dfa5e060bb6fe6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT fk_67f068bc37d925cb FOREIGN KEY (livre_id) REFERENCES livre (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT fk_ac634f993375bd21 FOREIGN KEY (editeur_id) REFERENCES editeur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
