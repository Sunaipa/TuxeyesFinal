<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190521134428 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE action_exp_pro ADD exp_pro_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE action_exp_pro ADD CONSTRAINT FK_87784BA794878B58 FOREIGN KEY (exp_pro_id) REFERENCES exp_pro (id)');
        $this->addSql('CREATE INDEX IDX_87784BA794878B58 ON action_exp_pro (exp_pro_id)');
        $this->addSql('ALTER TABLE competence ADD type_comp_id INT NOT NULL');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687F652C543E FOREIGN KEY (type_comp_id) REFERENCES type_comp (id)');
        $this->addSql('CREATE INDEX IDX_94D4687F652C543E ON competence (type_comp_id)');
        $this->addSql('ALTER TABLE detail_action ADD action_exp_pro_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE detail_action ADD CONSTRAINT FK_55069509F725E192 FOREIGN KEY (action_exp_pro_id) REFERENCES action_exp_pro (id)');
        $this->addSql('CREATE INDEX IDX_55069509F725E192 ON detail_action (action_exp_pro_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE action_exp_pro DROP FOREIGN KEY FK_87784BA794878B58');
        $this->addSql('DROP INDEX IDX_87784BA794878B58 ON action_exp_pro');
        $this->addSql('ALTER TABLE action_exp_pro DROP exp_pro_id');
        $this->addSql('ALTER TABLE competence DROP FOREIGN KEY FK_94D4687F652C543E');
        $this->addSql('DROP INDEX IDX_94D4687F652C543E ON competence');
        $this->addSql('ALTER TABLE competence DROP type_comp_id');
        $this->addSql('ALTER TABLE detail_action DROP FOREIGN KEY FK_55069509F725E192');
        $this->addSql('DROP INDEX IDX_55069509F725E192 ON detail_action');
        $this->addSql('ALTER TABLE detail_action DROP action_exp_pro_id');
    }
}
