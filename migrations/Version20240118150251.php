<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240118150251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recettes ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recettes ADD CONSTRAINT FK_EB48E72CBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_EB48E72CBCF5E72D ON recettes (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recettes DROP FOREIGN KEY FK_EB48E72CBCF5E72D');
        $this->addSql('DROP INDEX IDX_EB48E72CBCF5E72D ON recettes');
        $this->addSql('ALTER TABLE recettes DROP categorie_id');
    }
}
