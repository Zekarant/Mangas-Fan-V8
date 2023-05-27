<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20230820185906 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'We delete the dislike table, we put a varchar for the sources';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE news_dislike DROP FOREIGN KEY FK_A9DFF04CA76ED395');
        $this->addSql('ALTER TABLE news_dislike DROP FOREIGN KEY FK_A9DFF04CB5A459A0');
        $this->addSql('DROP TABLE news_dislike');
        $this->addSql('ALTER TABLE news CHANGE sources sources VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE news_dislike (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, news_id INT NOT NULL, INDEX IDX_A9DFF04CA76ED395 (user_id), INDEX IDX_A9DFF04CB5A459A0 (news_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE news_dislike ADD CONSTRAINT FK_A9DFF04CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE news_dislike ADD CONSTRAINT FK_A9DFF04CB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE news CHANGE sources sources VARCHAR(255) NOT NULL');
    }
}
