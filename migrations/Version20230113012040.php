<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230113012040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Rename manga column';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tome DROP FOREIGN KEY FK_6B19E4F750A088F4');
        $this->addSql('DROP INDEX IDX_6B19E4F750A088F4 ON tome');
        $this->addSql('ALTER TABLE tome CHANGE id_manga_id manga_id INT NOT NULL');
        $this->addSql('ALTER TABLE tome ADD CONSTRAINT FK_6B19E4F77B6461 FOREIGN KEY (manga_id) REFERENCES manga (id)');
        $this->addSql('CREATE INDEX IDX_6B19E4F77B6461 ON tome (manga_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tome DROP FOREIGN KEY FK_6B19E4F77B6461');
        $this->addSql('DROP INDEX IDX_6B19E4F77B6461 ON tome');
        $this->addSql('ALTER TABLE tome CHANGE manga_id id_manga_id INT NOT NULL');
        $this->addSql('ALTER TABLE tome ADD CONSTRAINT FK_6B19E4F750A088F4 FOREIGN KEY (id_manga_id) REFERENCES manga (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_6B19E4F750A088F4 ON tome (id_manga_id)');
    }
}
