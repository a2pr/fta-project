<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200320235649 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE expenses ADD dtc DATETIME DEFAULT NULL, ADD dtm DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE funds ADD dtc DATETIME DEFAULT NULL, ADD dtm DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE incomes ADD dtc DATETIME NOT NULL, ADD dtm DATETIME NOT NULL');
        $this->addSql('ALTER TABLE movements ADD dtc DATETIME NOT NULL, ADD dtm DATETIME NOT NULL');
        $this->addSql('ALTER TABLE sub_funds ADD dtc DATETIME NOT NULL, ADD dtm DATETIME NOT NULL');
        $this->addSql('ALTER TABLE transactions ADD dtc DATETIME NOT NULL, ADD dtm DATETIME NOT NULL');
        $this->addSql('ALTER TABLE users ADD dtc DATETIME NOT NULL');
        $this->addSql('ALTER TABLE users_banks ADD dtc DATETIME NOT NULL, ADD dtm DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE expenses DROP dtc, DROP dtm');
        $this->addSql('ALTER TABLE funds DROP dtc, DROP dtm');
        $this->addSql('ALTER TABLE incomes DROP dtc, DROP dtm');
        $this->addSql('ALTER TABLE movements DROP dtc, DROP dtm');
        $this->addSql('ALTER TABLE sub_funds DROP dtc, DROP dtm');
        $this->addSql('ALTER TABLE transactions DROP dtc, DROP dtm');
        $this->addSql('ALTER TABLE users DROP dtc');
        $this->addSql('ALTER TABLE users_banks DROP dtc, DROP dtm');
    }
}
