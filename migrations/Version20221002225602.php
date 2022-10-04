<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221002225602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animes (id INT AUTO_INCREMENT NOT NULL, title_anime VARCHAR(255) NOT NULL, image_anime VARCHAR(255) DEFAULT NULL, synopsis_anime LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, coup_coeur INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_animes (id INT AUTO_INCREMENT NOT NULL, id_anime INT NOT NULL, title_article VARCHAR(255) NOT NULL, cover_article VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mangas (id INT AUTO_INCREMENT NOT NULL, name_manga VARCHAR(255) NOT NULL, finish_manga INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tome_mangas (id INT AUTO_INCREMENT NOT NULL, name_tome VARCHAR(255) NOT NULL, cover_tome VARCHAR(255) DEFAULT NULL, id_manga INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE animes');
        $this->addSql('DROP TABLE articles_animes');
        $this->addSql('DROP TABLE mangas');
        $this->addSql('DROP TABLE tome_mangas');
    }
}
