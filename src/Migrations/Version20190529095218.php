<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190529095218 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, type_comp_id INT NOT NULL, 
                            titre VARCHAR(255) NOT NULL, INDEX IDX_94D4687F652C543E (type_comp_id), 
                            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exp_pro (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, titre VARCHAR(255) NOT NULL,
                            lieu VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, corp VARCHAR(6000) NOT NULL, 
                            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_perso (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL,
                            prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, 
                            tel VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_admin (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, 
                            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_comp (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, 
                            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, 
                            password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687F652C543E FOREIGN KEY (type_comp_id) REFERENCES type_comp (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competence DROP FOREIGN KEY FK_94D4687F652C543E');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE exp_pro');
        $this->addSql('DROP TABLE info_perso');
        $this->addSql('DROP TABLE site_admin');
        $this->addSql('DROP TABLE type_comp');
        $this->addSql('DROP TABLE user');
    }

}
