<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230104112640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE news_category (news_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_4F72BA90B5A459A0 (news_id), INDEX IDX_4F72BA9012469DE2 (category_id), PRIMARY KEY(news_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE news_category ADD CONSTRAINT FK_4F72BA90B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_category ADD CONSTRAINT FK_4F72BA9012469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_news DROP FOREIGN KEY FK_9648E31712469DE2');
        $this->addSql('ALTER TABLE category_news DROP FOREIGN KEY FK_9648E317B5A459A0');
        $this->addSql('DROP TABLE category_news');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_news (category_id INT NOT NULL, news_id INT NOT NULL, INDEX IDX_9648E31712469DE2 (category_id), INDEX IDX_9648E317B5A459A0 (news_id), PRIMARY KEY(category_id, news_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category_news ADD CONSTRAINT FK_9648E31712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_news ADD CONSTRAINT FK_9648E317B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_category DROP FOREIGN KEY FK_4F72BA90B5A459A0');
        $this->addSql('ALTER TABLE news_category DROP FOREIGN KEY FK_4F72BA9012469DE2');
        $this->addSql('DROP TABLE news_category');
    }
}
