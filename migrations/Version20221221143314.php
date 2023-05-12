<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221221143314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE players');
        $this->addSql('ALTER TABLE nation CHANGE image image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE player ADD nation_id INT NOT NULL, CHANGE firstname firstname VARCHAR(100) NOT NULL, CHANGE lastname lastname VARCHAR(100) NOT NULL, CHANGE portrait portrait VARCHAR(50) NOT NULL, CHANGE number number SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65AE3899 FOREIGN KEY (nation_id) REFERENCES nation (id)');
        $this->addSql('CREATE INDEX IDX_98197A65AE3899 ON player (nation_id)');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE players (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lastname VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE nation CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A65AE3899');
        $this->addSql('DROP INDEX IDX_98197A65AE3899 ON player');
        $this->addSql('ALTER TABLE player DROP nation_id, CHANGE firstname firstname VARCHAR(255) NOT NULL, CHANGE lastname lastname VARCHAR(255) NOT NULL, CHANGE portrait portrait VARCHAR(255) NOT NULL, CHANGE number number INT NOT NULL');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(255) NOT NULL, CHANGE roles roles VARCHAR(255) NOT NULL');
    }
}
