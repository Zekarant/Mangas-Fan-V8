<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230818213139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE news_dislike (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, news_id INT NOT NULL, INDEX IDX_A9DFF04CA76ED395 (user_id), INDEX IDX_A9DFF04CB5A459A0 (news_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_like (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, news_id INT NOT NULL, INDEX IDX_79BEB638A76ED395 (user_id), INDEX IDX_79BEB638B5A459A0 (news_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE news_dislike ADD CONSTRAINT FK_A9DFF04CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE news_dislike ADD CONSTRAINT FK_A9DFF04CB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('ALTER TABLE news_like ADD CONSTRAINT FK_79BEB638A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE news_like ADD CONSTRAINT FK_79BEB638B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE news_dislike DROP FOREIGN KEY FK_A9DFF04CA76ED395');
        $this->addSql('ALTER TABLE news_dislike DROP FOREIGN KEY FK_A9DFF04CB5A459A0');
        $this->addSql('ALTER TABLE news_like DROP FOREIGN KEY FK_79BEB638A76ED395');
        $this->addSql('ALTER TABLE news_like DROP FOREIGN KEY FK_79BEB638B5A459A0');
        $this->addSql('DROP TABLE news_dislike');
        $this->addSql('DROP TABLE news_like');
    }
}
