<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250914011826 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE comment_id_seq CASCADE');
        $this->addSql('CREATE TABLE auteur (id SERIAL NOT NULL, nom VARCHAR(255) NOT NULL, prenoms VARCHAR(255) NOT NULL, date_naissance TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_deces TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, nationalite VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN auteur.date_naissance IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN auteur.date_deces IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE auteur_livre (auteur_id INT NOT NULL, livre_id INT NOT NULL, PRIMARY KEY(auteur_id, livre_id))');
        $this->addSql('CREATE INDEX IDX_A6DFA5E060BB6FE6 ON auteur_livre (auteur_id)');
        $this->addSql('CREATE INDEX IDX_A6DFA5E037D925CB ON auteur_livre (livre_id)');
        $this->addSql('CREATE TABLE commentaire (id SERIAL NOT NULL, livre_id INT NOT NULL, nom_auteur VARCHAR(255) NOT NULL, mail_auteur VARCHAR(255) NOT NULL, date_creation TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_publication TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, contenu VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_67F068BC37D925CB ON commentaire (livre_id)');
        $this->addSql('COMMENT ON COLUMN commentaire.date_creation IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN commentaire.date_publication IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE auteur_livre ADD CONSTRAINT FK_A6DFA5E060BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE auteur_livre ADD CONSTRAINT FK_A6DFA5E037D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE comment');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE comment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE comment (id SERIAL NOT NULL, nom_auteur VARCHAR(100) NOT NULL, mail_auteur VARCHAR(100) NOT NULL, date_creation TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_publication TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, statut VARCHAR(100) NOT NULL, livre VARCHAR(100) NOT NULL, contenu VARCHAR(500) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE auteur_livre DROP CONSTRAINT FK_A6DFA5E060BB6FE6');
        $this->addSql('ALTER TABLE auteur_livre DROP CONSTRAINT FK_A6DFA5E037D925CB');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT FK_67F068BC37D925CB');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE auteur_livre');
        $this->addSql('DROP TABLE commentaire');
    }
}
