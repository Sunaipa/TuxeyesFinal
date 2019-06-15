<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190609144706 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql("INSERT INTO info_perso ( id, nom, prenom, adresse, mail, tel) VALUES ( 1, 'Haumey', 'Nicolas', '4 avenue d\'alden park'  , 'nicolas.haumey@hotmail.fr', '0686953352' )");
        $this->addSql("INSERT INTO type_comp (id, categorie) VALUES (1, 'Compétence fonctionnelle' ) ");

    }

    public function down(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql("DELETE info_perso WHERE id = 1 ");
        $this->addSql("DELETE type_comp WHERE id = 1");

    }
}
