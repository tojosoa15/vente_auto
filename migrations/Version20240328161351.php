<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240328161351 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenements CHANGE business_account business_account VARCHAR(255) DEFAULT NULL, CHANGE event_account event_account VARCHAR(255) DEFAULT NULL, CHANGE last_event_count last_event_count VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenements CHANGE business_account business_account VARCHAR(255) NOT NULL, CHANGE event_account event_account VARCHAR(255) NOT NULL, CHANGE last_event_count last_event_count VARCHAR(255) NOT NULL');
    }
}
