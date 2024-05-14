<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230826105343 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Rename some columns and tables name';
    }

    public function up(Schema $schema): void
    {
        // rename tables
        $this->addSql('ALTER TABLE `options` RENAME `option`');
        $this->addSql('ALTER TABLE comments RENAME comment');
        $this->addSql('ALTER TABLE images RENAME image');
        $this->addSql('ALTER TABLE mangas RENAME manga');
        $this->addSql('ALTER TABLE animes RENAME anime');
        $this->addSql('ALTER TABLE tome_mangas RENAME tome_manga');
        $this->addSql('ALTER TABLE articles_anime RENAME article_anime');

        // rename columns
        $this->addSql('ALTER TABLE manga RENAME COLUMN name_manga TO `name`');
        $this->addSql('ALTER TABLE manga RENAME COLUMN finish_manga TO `is_finish`');

        $this->addSql('ALTER TABLE anime RENAME COLUMN title_anime TO title');
        $this->addSql('ALTER TABLE anime RENAME COLUMN image_anime TO image');
        $this->addSql('ALTER TABLE anime RENAME COLUMN synopsis_anime TO synopsis');
        $this->addSql('ALTER TABLE anime RENAME COLUMN coup_coeur TO is_favorite');

        $this->addSql('ALTER TABLE article_anime RENAME COLUMN id_anime_id TO `anime_id`');
        $this->addSql('ALTER TABLE article_anime RENAME COLUMN title_article TO `title`');
        $this->addSql('ALTER TABLE article_anime RENAME COLUMN cover_article TO `article`');

        $this->addSql('ALTER TABLE tome_manga RENAME COLUMN name_tome TO `name`');
        $this->addSql('ALTER TABLE tome_manga RENAME COLUMN cover_tome TO cover');
        $this->addSql('ALTER TABLE tome_manga RENAME COLUMN id_manga_id TO manga_id');

        $this->addSql('ALTER TABLE news RENAME COLUMN title_news TO title');
        $this->addSql('ALTER TABLE news RENAME COLUMN description_news TO description');
        $this->addSql('ALTER TABLE news RENAME COLUMN content_news TO content');
        $this->addSql('ALTER TABLE news RENAME COLUMN keywords_news TO keywords');

        // change type
        $this->addSql('ALTER TABLE anime CHANGE is_favorite is_favorite TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE manga CHANGE is_finish is_finish TINYINT(1) NOT NULL');

        // change index
        $this->addSql('ALTER TABLE article_anime CHANGE article cover VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE article_anime RENAME INDEX idx_fbe671b62990521c TO IDX_64B32B53794BBE89');
        $this->addSql('ALTER TABLE comment RENAME INDEX idx_5f9e962ab5a459a0 TO IDX_9474526CB5A459A0');
        $this->addSql('ALTER TABLE comment RENAME INDEX idx_5f9e962aa76ed395 TO IDX_9474526CA76ED395');
        $this->addSql('ALTER TABLE tome_manga RENAME INDEX idx_d699fb9e50a088f4 TO IDX_403206F57B6461');
    }

    public function down(Schema $schema): void
    {
        // rename tables
        $this->addSql('ALTER TABLE `option` RENAME `options`');
        $this->addSql('ALTER TABLE comment RENAME comments');
        $this->addSql('ALTER TABLE image RENAME images');
        $this->addSql('ALTER TABLE manga RENAME mangas');
        $this->addSql('ALTER TABLE anime RENAME animes');
        $this->addSql('ALTER TABLE tome_manga RENAME tome_mangas');
        $this->addSql('ALTER TABLE article_anime RENAME articles_anime');

        // rename columns
        $this->addSql('ALTER TABLE mangas RENAME COLUMN `name` TO `name_manga`');
        $this->addSql('ALTER TABLE mangas RENAME COLUMN is_finish TO finish_manga');

        $this->addSql('ALTER TABLE animes RENAME COLUMN title TO title_anime');
        $this->addSql('ALTER TABLE animes RENAME COLUMN image TO image_anime');
        $this->addSql('ALTER TABLE animes RENAME COLUMN synopsis TO synopsis_anime');
        $this->addSql('ALTER TABLE animes RENAME COLUMN is_favorite TO coup_coeur');

        $this->addSql('ALTER TABLE articles_anime RENAME COLUMN anime_id TO id_anime_id');
        $this->addSql('ALTER TABLE articles_anime RENAME COLUMN title TO title_article');
        $this->addSql('ALTER TABLE articles_anime RENAME COLUMN cover TO cover_article');

        $this->addSql('ALTER TABLE tome_mangas RENAME COLUMN `name` TO name_tome');
        $this->addSql('ALTER TABLE tome_mangas RENAME COLUMN cover TO cover_tome');
        $this->addSql('ALTER TABLE tome_mangas RENAME COLUMN manga_id TO id_manga_id');

        $this->addSql('ALTER TABLE news RENAME COLUMN title TO title_news');
        $this->addSql('ALTER TABLE news RENAME COLUMN description TO description_news');
        $this->addSql('ALTER TABLE news RENAME COLUMN content TO content_news');
        $this->addSql('ALTER TABLE news RENAME COLUMN keywords TO keywords_news');

        // change type
        $this->addSql('ALTER TABLE anime CHANGE is_favorite is_favorite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE manga CHANGE is_finish is_finish INT NOT NULL');

        // change index
        $this->addSql('ALTER TABLE comment RENAME INDEX idx_9474526cb5a459a0 TO IDX_5F9E962AB5A459A0');
        $this->addSql('ALTER TABLE comment RENAME INDEX idx_9474526ca76ed395 TO IDX_5F9E962AA76ED395');
        $this->addSql('ALTER TABLE tome_manga RENAME INDEX idx_403206f57b6461 TO IDX_D699FB9E50A088F4');
        $this->addSql('ALTER TABLE article_anime CHANGE cover article VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE article_anime RENAME INDEX idx_64b32b53794bbe89 TO IDX_FBE671B62990521C');
    }
}
