<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190612120716 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE description (id INT AUTO_INCREMENT NOT NULL, facture_id INT DEFAULT NULL, content LONGTEXT DEFAULT NULL, unit INT DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, INDEX IDX_6DE440267F2DEE08 (facture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, my_company VARCHAR(255) DEFAULT NULL, client_company VARCHAR(255) DEFAULT NULL, total DOUBLE PRECISION DEFAULT NULL, vat INT DEFAULT NULL, invoice_date DATETIME DEFAULT NULL, due_date DATETIME DEFAULT NULL, project_description LONGTEXT DEFAULT NULL, payment_methods VARCHAR(255) DEFAULT NULL, details VARCHAR(255) DEFAULT NULL, invoice_number VARCHAR(255) DEFAULT NULL, reference_no VARCHAR(255) DEFAULT NULL, invoice_terms VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE description ADD CONSTRAINT FK_6DE440267F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE description DROP FOREIGN KEY FK_6DE440267F2DEE08');
        $this->addSql('DROP TABLE description');
        $this->addSql('DROP TABLE facture');
    }
}
