<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240325202151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenements (id INT AUTO_INCREMENT NOT NULL, business_account VARCHAR(255) NOT NULL, event_account VARCHAR(255) NOT NULL, last_event_count VARCHAR(255) NOT NULL, file_number INT NOT NULL, civility_wording VARCHAR(255) DEFAULT NULL, current_vehicle_owner VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, route_number_and_name VARCHAR(255) DEFAULT NULL, adress_complement VARCHAR(255) DEFAULT NULL, postal_code INT NOT NULL, city VARCHAR(255) DEFAULT NULL, home_phone INT DEFAULT NULL, cell_phone INT DEFAULT NULL, phone_job INT DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, date_of_circulation DATE DEFAULT NULL, purchase_date DATE DEFAULT NULL, last_event_date DATE DEFAULT NULL, brand_name VARCHAR(255) DEFAULT NULL, model_wording VARCHAR(255) DEFAULT NULL, version VARCHAR(255) DEFAULT NULL, vin VARCHAR(255) DEFAULT NULL, registration VARCHAR(255) DEFAULT NULL, lead_type VARCHAR(255) DEFAULT NULL, mileage INT DEFAULT NULL, energy_label VARCHAR(255) DEFAULT NULL, seller_vn VARCHAR(255) DEFAULT NULL, seller_vo VARCHAR(255) DEFAULT NULL, billing_comment VARCHAR(255) DEFAULT NULL, type_vo_vn VARCHAR(255) DEFAULT NULL, file_number_vn_vo VARCHAR(255) DEFAULT NULL, vn_sales_intermediary VARCHAR(255) DEFAULT NULL, event_date DATE DEFAULT NULL, origin_of_event VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE evenements');
    }
}
