<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210311185915 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dinosaur (id INT AUTO_INCREMENT NOT NULL, period_id INT NOT NULL, diet_id INT NOT NULL, continent_id INT NOT NULL, name VARCHAR(255) NOT NULL, weight INT NOT NULL, height DOUBLE PRECISION NOT NULL, lenght INT NOT NULL, top_speed INT NOT NULL, top TINYINT(1) NOT NULL, img VARCHAR(255) DEFAULT NULL, INDEX IDX_DAEDC56EEC8B7ADE (period_id), INDEX IDX_DAEDC56EE1E13ACE (diet_id), INDEX IDX_DAEDC56E921F4C77 (continent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_dinosaur (user_id INT NOT NULL, dinosaur_id INT NOT NULL, INDEX IDX_3A60216EA76ED395 (user_id), INDEX IDX_3A60216E4C3E9E0E (dinosaur_id), PRIMARY KEY(user_id, dinosaur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dinosaur ADD CONSTRAINT FK_DAEDC56EEC8B7ADE FOREIGN KEY (period_id) REFERENCES period (id)');
        $this->addSql('ALTER TABLE dinosaur ADD CONSTRAINT FK_DAEDC56EE1E13ACE FOREIGN KEY (diet_id) REFERENCES diet (id)');
        $this->addSql('ALTER TABLE dinosaur ADD CONSTRAINT FK_DAEDC56E921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id)');
        $this->addSql('ALTER TABLE user_dinosaur ADD CONSTRAINT FK_3A60216EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_dinosaur ADD CONSTRAINT FK_3A60216E4C3E9E0E FOREIGN KEY (dinosaur_id) REFERENCES dinosaur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_dinosaur DROP FOREIGN KEY FK_3A60216E4C3E9E0E');
        $this->addSql('ALTER TABLE user_dinosaur DROP FOREIGN KEY FK_3A60216EA76ED395');
        $this->addSql('DROP TABLE dinosaur');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_dinosaur');
    }
}
