<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190105093030 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE propertytype (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE amenity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE construction_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price_in_month (id INT AUTO_INCREMENT NOT NULL, property_id INT NOT NULL, price NUMERIC(10, 2) NOT NULL, month INT NOT NULL, INDEX IDX_A6F5356F549213EC (property_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, type_id INT NOT NULL, construction_type_id INT NOT NULL, town_id INT NOT NULL, sea_distance_unit_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, bedrooms INT NOT NULL, bathrooms NUMERIC(3, 1) DEFAULT NULL, surface INT NOT NULL, sea_distance NUMERIC(10, 2) DEFAULT NULL, living_rooms INT NOT NULL, max_number_of_people INT NOT NULL, description LONGTEXT DEFAULT NULL, minimum_stay INT DEFAULT NULL, additional_equipment LONGTEXT DEFAULT NULL, additional_services LONGTEXT DEFAULT NULL, additional_fees LONGTEXT DEFAULT NULL, INDEX IDX_8BF21CDE6BF700BD (status_id), INDEX IDX_8BF21CDEC54C8C93 (type_id), INDEX IDX_8BF21CDE7A653FE7 (construction_type_id), INDEX IDX_8BF21CDE75E23604 (town_id), INDEX IDX_8BF21CDEFF6D90CC (sea_distance_unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property_amenity (property_id INT NOT NULL, amenity_id INT NOT NULL, INDEX IDX_F2AD331B549213EC (property_id), INDEX IDX_F2AD331B9F9F1305 (amenity_id), PRIMARY KEY(property_id, amenity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE province (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sea_distance_unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE town (id INT AUTO_INCREMENT NOT NULL, province_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_4CE6C7A4E946114A (province_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE price_in_month ADD CONSTRAINT FK_A6F5356F549213EC FOREIGN KEY (property_id) REFERENCES property (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEC54C8C93 FOREIGN KEY (type_id) REFERENCES propertytype (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE7A653FE7 FOREIGN KEY (construction_type_id) REFERENCES construction_type (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE75E23604 FOREIGN KEY (town_id) REFERENCES town (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEFF6D90CC FOREIGN KEY (sea_distance_unit_id) REFERENCES sea_distance_unit (id)');
        $this->addSql('ALTER TABLE property_amenity ADD CONSTRAINT FK_F2AD331B549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE property_amenity ADD CONSTRAINT FK_F2AD331B9F9F1305 FOREIGN KEY (amenity_id) REFERENCES amenity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE town ADD CONSTRAINT FK_4CE6C7A4E946114A FOREIGN KEY (province_id) REFERENCES province (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE6BF700BD');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEC54C8C93');
        $this->addSql('ALTER TABLE property_amenity DROP FOREIGN KEY FK_F2AD331B9F9F1305');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE7A653FE7');
        $this->addSql('ALTER TABLE price_in_month DROP FOREIGN KEY FK_A6F5356F549213EC');
        $this->addSql('ALTER TABLE property_amenity DROP FOREIGN KEY FK_F2AD331B549213EC');
        $this->addSql('ALTER TABLE town DROP FOREIGN KEY FK_4CE6C7A4E946114A');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEFF6D90CC');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE75E23604');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE propertytype');
        $this->addSql('DROP TABLE amenity');
        $this->addSql('DROP TABLE construction_type');
        $this->addSql('DROP TABLE price_in_month');
        $this->addSql('DROP TABLE property');
        $this->addSql('DROP TABLE property_amenity');
        $this->addSql('DROP TABLE province');
        $this->addSql('DROP TABLE sea_distance_unit');
        $this->addSql('DROP TABLE town');
    }
}
