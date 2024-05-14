<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230819103825 extends AbstractMigration
{
    function getDescription(): string
    {
        return 'Creation of the first tables of the application';
    }

    function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE IF NOT EXISTS animes (id INT AUTO_INCREMENT NOT NULL, title_anime VARCHAR(255) NOT NULL, image_anime VARCHAR(255) DEFAULT NULL, synopsis_anime LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, coup_coeur INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS articles_anime (id INT AUTO_INCREMENT NOT NULL, id_anime_id INT NOT NULL, title_article VARCHAR(255) NOT NULL, cover_article VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_FBE671B62990521C (id_anime_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, color VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS comments (id INT AUTO_INCREMENT NOT NULL, news_id INT NOT NULL, user_id INT NOT NULL, content VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_5F9E962AB5A459A0 (news_id), INDEX IDX_5F9E962AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS images (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, alt_text VARCHAR(255) NOT NULL, filename VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS mangas (id INT AUTO_INCREMENT NOT NULL, name_manga VARCHAR(255) NOT NULL, finish_manga INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS news (id INT AUTO_INCREMENT NOT NULL, author_id INT DEFAULT NULL, title_news VARCHAR(255) NOT NULL, description_news VARCHAR(255) NOT NULL, content_news LONGTEXT NOT NULL, keywords_news VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, image LONGTEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, visibility TINYINT(1) NOT NULL, sources VARCHAR(255) DEFAULT NULL, INDEX IDX_1DD39950F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS news_category (news_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_4F72BA90B5A459A0 (news_id), INDEX IDX_4F72BA9012469DE2 (category_id), PRIMARY KEY(news_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS news_dislike (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, news_id INT NOT NULL, INDEX IDX_A9DFF04CA76ED395 (user_id), INDEX IDX_A9DFF04CB5A459A0 (news_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS news_like (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, news_id INT NOT NULL, INDEX IDX_79BEB638A76ED395 (user_id), INDEX IDX_79BEB638B5A459A0 (news_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS options (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS page (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS tome_mangas (id INT AUTO_INCREMENT NOT NULL, id_manga_id INT NOT NULL, name_tome VARCHAR(255) NOT NULL, cover_tome VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_D699FB9E50A088F4 (id_manga_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles_anime ADD CONSTRAINT FK_FBE671B62990521C FOREIGN KEY (id_anime_id) REFERENCES animes (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE news_category ADD CONSTRAINT FK_4F72BA90B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_category ADD CONSTRAINT FK_4F72BA9012469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_dislike ADD CONSTRAINT FK_A9DFF04CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE news_dislike ADD CONSTRAINT FK_A9DFF04CB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('ALTER TABLE news_like ADD CONSTRAINT FK_79BEB638A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE news_like ADD CONSTRAINT FK_79BEB638B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('ALTER TABLE tome_mangas ADD CONSTRAINT FK_D699FB9E50A088F4 FOREIGN KEY (id_manga_id) REFERENCES mangas (id)');
    }

    function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE articles_anime DROP FOREIGN KEY FK_FBE671B62990521C');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AB5A459A0');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AA76ED395');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950F675F31B');
        $this->addSql('ALTER TABLE news_category DROP FOREIGN KEY FK_4F72BA90B5A459A0');
        $this->addSql('ALTER TABLE news_category DROP FOREIGN KEY FK_4F72BA9012469DE2');
        $this->addSql('ALTER TABLE news_dislike DROP FOREIGN KEY FK_A9DFF04CA76ED395');
        $this->addSql('ALTER TABLE news_dislike DROP FOREIGN KEY FK_A9DFF04CB5A459A0');
        $this->addSql('ALTER TABLE news_like DROP FOREIGN KEY FK_79BEB638A76ED395');
        $this->addSql('ALTER TABLE news_like DROP FOREIGN KEY FK_79BEB638B5A459A0');
        $this->addSql('ALTER TABLE tome_mangas DROP FOREIGN KEY FK_D699FB9E50A088F4');
        $this->addSql('DROP TABLE animes');
        $this->addSql('DROP TABLE articles_anime');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE mangas');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE news_category');
        $this->addSql('DROP TABLE news_dislike');
        $this->addSql('DROP TABLE news_like');
        $this->addSql('DROP TABLE options');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE tome_mangas');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
