<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190612131554 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE description CHANGE facture_id facture_id INT DEFAULT NULL, CHANGE unit unit INT DEFAULT NULL, CHANGE price price DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE facture CHANGE my_company my_company VARCHAR(255) DEFAULT NULL, CHANGE client_company client_company VARCHAR(255) DEFAULT NULL, CHANGE total total DOUBLE PRECISION DEFAULT NULL, CHANGE vat vat INT DEFAULT NULL, CHANGE invoice_date invoice_date DATETIME DEFAULT NULL, CHANGE due_date due_date DATETIME DEFAULT NULL, CHANGE payment_methods payment_methods VARCHAR(255) DEFAULT NULL, CHANGE details details VARCHAR(255) DEFAULT NULL, CHANGE invoice_number invoice_number VARCHAR(255) DEFAULT NULL, CHANGE reference_no reference_no VARCHAR(255) DEFAULT NULL, CHANGE invoice_terms invoice_terms VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE description CHANGE facture_id facture_id INT DEFAULT NULL, CHANGE unit unit INT DEFAULT NULL, CHANGE price price DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE facture CHANGE my_company my_company VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE client_company client_company VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE total total DOUBLE PRECISION DEFAULT \'NULL\', CHANGE vat vat INT DEFAULT NULL, CHANGE invoice_date invoice_date DATETIME DEFAULT \'NULL\', CHANGE due_date due_date DATETIME DEFAULT \'NULL\', CHANGE payment_methods payment_methods VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE details details VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE invoice_number invoice_number VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE reference_no reference_no VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE invoice_terms invoice_terms VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
