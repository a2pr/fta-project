<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200311032156 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE expenses (id INT AUTO_INCREMENT NOT NULL, id_transaction_id INT NOT NULL, id_fund_id INT NOT NULL, id_sub_funds_id INT NOT NULL, id_bank_id INT NOT NULL, reason VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_2496F35B12A67609 (id_transaction_id), INDEX IDX_2496F35BFB3E26F9 (id_fund_id), INDEX IDX_2496F35BEA5EBE05 (id_sub_funds_id), INDEX IDX_2496F35BCF555231 (id_bank_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE incomes (id INT AUTO_INCREMENT NOT NULL, id_transaction_id INT DEFAULT NULL, id_fund_id INT NOT NULL, id_sub_funds_id INT NOT NULL, id_bank_id INT NOT NULL, reason VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9DE2B5BD12A67609 (id_transaction_id), INDEX IDX_9DE2B5BDFB3E26F9 (id_fund_id), INDEX IDX_9DE2B5BDEA5EBE05 (id_sub_funds_id), INDEX IDX_9DE2B5BDCF555231 (id_bank_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movements (id INT AUTO_INCREMENT NOT NULL, id_transaction_id INT NOT NULL, id_bank_output_id INT NOT NULL, id_bank_arrival_id INT NOT NULL, reason VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, arrival_currency VARCHAR(50) NOT NULL, output_currency VARCHAR(50) NOT NULL, INDEX IDX_3823752112A67609 (id_transaction_id), INDEX IDX_382375219082931F (id_bank_output_id), INDEX IDX_382375212869236 (id_bank_arrival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transactions (id INT AUTO_INCREMENT NOT NULL, id_users_id INT NOT NULL, date DATETIME NOT NULL, amount DOUBLE PRECISION NOT NULL, money VARCHAR(50) NOT NULL, operation INT NOT NULL, INDEX IDX_EAA81A4C376858A8 (id_users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_2496F35B12A67609 FOREIGN KEY (id_transaction_id) REFERENCES transactions (id)');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_2496F35BFB3E26F9 FOREIGN KEY (id_fund_id) REFERENCES sub_funds (id)');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_2496F35BEA5EBE05 FOREIGN KEY (id_sub_funds_id) REFERENCES sub_funds (id)');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_2496F35BCF555231 FOREIGN KEY (id_bank_id) REFERENCES users_banks (id)');
        $this->addSql('ALTER TABLE incomes ADD CONSTRAINT FK_9DE2B5BD12A67609 FOREIGN KEY (id_transaction_id) REFERENCES transactions (id)');
        $this->addSql('ALTER TABLE incomes ADD CONSTRAINT FK_9DE2B5BDFB3E26F9 FOREIGN KEY (id_fund_id) REFERENCES funds (id)');
        $this->addSql('ALTER TABLE incomes ADD CONSTRAINT FK_9DE2B5BDEA5EBE05 FOREIGN KEY (id_sub_funds_id) REFERENCES sub_funds (id)');
        $this->addSql('ALTER TABLE incomes ADD CONSTRAINT FK_9DE2B5BDCF555231 FOREIGN KEY (id_bank_id) REFERENCES users_banks (id)');
        $this->addSql('ALTER TABLE movements ADD CONSTRAINT FK_3823752112A67609 FOREIGN KEY (id_transaction_id) REFERENCES transactions (id)');
        $this->addSql('ALTER TABLE movements ADD CONSTRAINT FK_382375219082931F FOREIGN KEY (id_bank_output_id) REFERENCES users_banks (id)');
        $this->addSql('ALTER TABLE movements ADD CONSTRAINT FK_382375212869236 FOREIGN KEY (id_bank_arrival_id) REFERENCES users_banks (id)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4C376858A8 FOREIGN KEY (id_users_id) REFERENCES users (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE expenses DROP FOREIGN KEY FK_2496F35B12A67609');
        $this->addSql('ALTER TABLE incomes DROP FOREIGN KEY FK_9DE2B5BD12A67609');
        $this->addSql('ALTER TABLE movements DROP FOREIGN KEY FK_3823752112A67609');
        $this->addSql('DROP TABLE expenses');
        $this->addSql('DROP TABLE incomes');
        $this->addSql('DROP TABLE movements');
        $this->addSql('DROP TABLE transactions');
    }
}
