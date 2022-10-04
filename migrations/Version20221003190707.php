<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221003190707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tome_mangas_mangas DROP FOREIGN KEY FK_64C96433DDC4978F');
        $this->addSql('ALTER TABLE tome_mangas_mangas DROP FOREIGN KEY FK_64C96433EF57438A');
        $this->addSql('DROP TABLE tome_mangas_mangas');
        $this->addSql('ALTER TABLE tome_mangas ADD id_manga_id INT NOT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE tome_mangas ADD CONSTRAINT FK_D699FB9E50A088F4 FOREIGN KEY (id_manga_id) REFERENCES mangas (id)');
        $this->addSql('CREATE INDEX IDX_D699FB9E50A088F4 ON tome_mangas (id_manga_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tome_mangas_mangas (tome_mangas_id INT NOT NULL, mangas_id INT NOT NULL, INDEX IDX_64C96433EF57438A (tome_mangas_id), INDEX IDX_64C96433DDC4978F (mangas_id), PRIMARY KEY(tome_mangas_id, mangas_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE tome_mangas_mangas ADD CONSTRAINT FK_64C96433DDC4978F FOREIGN KEY (mangas_id) REFERENCES mangas (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tome_mangas_mangas ADD CONSTRAINT FK_64C96433EF57438A FOREIGN KEY (tome_mangas_id) REFERENCES tome_mangas (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tome_mangas DROP FOREIGN KEY FK_D699FB9E50A088F4');
        $this->addSql('DROP INDEX IDX_D699FB9E50A088F4 ON tome_mangas');
        $this->addSql('ALTER TABLE tome_mangas DROP id_manga_id, DROP created_at, DROP updated_at');
    }
}
