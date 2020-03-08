<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200308051152 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE funds (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_6654D5179F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_funds (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_funds_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_EA2129E879F37AE5 (id_user_id), INDEX IDX_EA2129E823EBC9BB (id_funds_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE funds ADD CONSTRAINT FK_6654D5179F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE sub_funds ADD CONSTRAINT FK_EA2129E879F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE sub_funds ADD CONSTRAINT FK_EA2129E823EBC9BB FOREIGN KEY (id_funds_id) REFERENCES funds (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sub_funds DROP FOREIGN KEY FK_EA2129E823EBC9BB');
        $this->addSql('DROP TABLE funds');
        $this->addSql('DROP TABLE sub_funds');
    }
}
