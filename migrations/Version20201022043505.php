<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Create Attribution entity
 */
final class Version20201022043505 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE atribution (id INT AUTO_INCREMENT NOT NULL, computer_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, date DATE NOT NULL, hour DATE NOT NULL, INDEX IDX_1F813787A426D518 (computer_id), INDEX IDX_1F8137879395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE atribution ADD CONSTRAINT FK_1F813787A426D518 FOREIGN KEY (computer_id) REFERENCES computer (id)');
        $this->addSql('ALTER TABLE atribution ADD CONSTRAINT FK_1F8137879395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE atribution');
    }
}
