<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250415174218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE tournament ADD winner_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tournament ADD CONSTRAINT FK_BD5FB8D95DFCD4B8 FOREIGN KEY (winner_id) REFERENCES player (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_BD5FB8D95DFCD4B8 ON tournament (winner_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE tournament DROP FOREIGN KEY FK_BD5FB8D95DFCD4B8
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_BD5FB8D95DFCD4B8 ON tournament
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tournament DROP winner_id
        SQL);
    }
}
