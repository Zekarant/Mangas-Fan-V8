<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230113011119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Rename the Anime, ArticleAnime and Manga tables in the singular. Rename Tome table. Rename some columns of manga and anime tables. Add some columns for manga.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anime (id INT AUTO_INCREMENT NOT NULL, is_favorite_monthly TINYINT(1) DEFAULT 0 NOT NULL, title VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, synopsis LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_anime (id INT AUTO_INCREMENT NOT NULL, anime_id INT NOT NULL, title VARCHAR(255) NOT NULL, cover_picture VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_64B32B53794BBE89 (anime_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manga (id INT AUTO_INCREMENT NOT NULL, is_finish TINYINT(1) DEFAULT 0 NOT NULL, title VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, synopsis LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tome (id INT AUTO_INCREMENT NOT NULL, id_manga_id INT NOT NULL, name VARCHAR(255) NOT NULL, cover_picture VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_6B19E4F750A088F4 (id_manga_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_anime ADD CONSTRAINT FK_64B32B53794BBE89 FOREIGN KEY (anime_id) REFERENCES anime (id)');
        $this->addSql('ALTER TABLE tome ADD CONSTRAINT FK_6B19E4F750A088F4 FOREIGN KEY (id_manga_id) REFERENCES manga (id)');
        $this->addSql('ALTER TABLE tome_mangas DROP FOREIGN KEY FK_D699FB9E50A088F4');
        $this->addSql('ALTER TABLE articles_anime DROP FOREIGN KEY FK_FBE671B62990521C');
        $this->addSql('DROP TABLE mangas');
        $this->addSql('DROP TABLE tome_mangas');
        $this->addSql('DROP TABLE articles_anime');
        $this->addSql('DROP TABLE animes');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mangas (id INT AUTO_INCREMENT NOT NULL, name_manga VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, finish_manga INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tome_mangas (id INT AUTO_INCREMENT NOT NULL, id_manga_id INT NOT NULL, name_tome VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, cover_tome VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_D699FB9E50A088F4 (id_manga_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE articles_anime (id INT AUTO_INCREMENT NOT NULL, id_anime_id INT NOT NULL, title_article VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, cover_article VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_FBE671B62990521C (id_anime_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE animes (id INT AUTO_INCREMENT NOT NULL, title_anime VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image_anime VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, synopsis_anime LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, coup_coeur INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE tome_mangas ADD CONSTRAINT FK_D699FB9E50A088F4 FOREIGN KEY (id_manga_id) REFERENCES mangas (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE articles_anime ADD CONSTRAINT FK_FBE671B62990521C FOREIGN KEY (id_anime_id) REFERENCES animes (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE article_anime DROP FOREIGN KEY FK_64B32B53794BBE89');
        $this->addSql('ALTER TABLE tome DROP FOREIGN KEY FK_6B19E4F750A088F4');
        $this->addSql('DROP TABLE anime');
        $this->addSql('DROP TABLE article_anime');
        $this->addSql('DROP TABLE manga');
        $this->addSql('DROP TABLE tome');
    }
}
