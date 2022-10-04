<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221003190029 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mangas (id INT AUTO_INCREMENT NOT NULL, name_manga VARCHAR(255) NOT NULL, finish_manga INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tome_mangas (id INT AUTO_INCREMENT NOT NULL, name_tome VARCHAR(255) NOT NULL, cover_tome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tome_mangas_mangas (tome_mangas_id INT NOT NULL, mangas_id INT NOT NULL, INDEX IDX_64C96433EF57438A (tome_mangas_id), INDEX IDX_64C96433DDC4978F (mangas_id), PRIMARY KEY(tome_mangas_id, mangas_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tome_mangas_mangas ADD CONSTRAINT FK_64C96433EF57438A FOREIGN KEY (tome_mangas_id) REFERENCES tome_mangas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tome_mangas_mangas ADD CONSTRAINT FK_64C96433DDC4978F FOREIGN KEY (mangas_id) REFERENCES mangas (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tome_mangas_mangas DROP FOREIGN KEY FK_64C96433EF57438A');
        $this->addSql('ALTER TABLE tome_mangas_mangas DROP FOREIGN KEY FK_64C96433DDC4978F');
        $this->addSql('DROP TABLE mangas');
        $this->addSql('DROP TABLE tome_mangas');
        $this->addSql('DROP TABLE tome_mangas_mangas');
    }
}
