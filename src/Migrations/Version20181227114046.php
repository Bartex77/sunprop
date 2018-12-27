<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181227114046 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE property_property_feature DROP FOREIGN KEY FK_33772782D545984A');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE1A180200');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE9C81C6EB');
        $this->addSql('CREATE TABLE amenity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property_amenity (property_id INT NOT NULL, amenity_id INT NOT NULL, INDEX IDX_F2AD331B549213EC (property_id), INDEX IDX_F2AD331B9F9F1305 (amenity_id), PRIMARY KEY(property_id, amenity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE property_amenity ADD CONSTRAINT FK_F2AD331B549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE property_amenity ADD CONSTRAINT FK_F2AD331B9F9F1305 FOREIGN KEY (amenity_id) REFERENCES amenity (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE property_feature');
        $this->addSql('DROP TABLE property_property_feature');
        $this->addSql('DROP TABLE property_status');
        $this->addSql('DROP TABLE property_type');
        $this->addSql('DROP INDEX IDX_8BF21CDE9C81C6EB ON property');
        $this->addSql('DROP INDEX IDX_8BF21CDE1A180200 ON property');
        $this->addSql('ALTER TABLE property ADD status_id INT NOT NULL, ADD type_id INT NOT NULL, ADD additional_fees LONGTEXT DEFAULT NULL, DROP property_status_id, DROP property_type_id');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_8BF21CDE6BF700BD ON property (status_id)');
        $this->addSql('CREATE INDEX IDX_8BF21CDEC54C8C93 ON property (type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE property_amenity DROP FOREIGN KEY FK_F2AD331B9F9F1305');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE6BF700BD');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEC54C8C93');
        $this->addSql('CREATE TABLE property_feature (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE property_property_feature (property_id INT NOT NULL, property_feature_id INT NOT NULL, INDEX IDX_33772782549213EC (property_id), INDEX IDX_33772782D545984A (property_feature_id), PRIMARY KEY(property_id, property_feature_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE property_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE property_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE property_property_feature ADD CONSTRAINT FK_33772782549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE property_property_feature ADD CONSTRAINT FK_33772782D545984A FOREIGN KEY (property_feature_id) REFERENCES property_feature (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE amenity');
        $this->addSql('DROP TABLE property_amenity');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP INDEX IDX_8BF21CDE6BF700BD ON property');
        $this->addSql('DROP INDEX IDX_8BF21CDEC54C8C93 ON property');
        $this->addSql('ALTER TABLE property ADD property_status_id INT NOT NULL, ADD property_type_id INT NOT NULL, DROP status_id, DROP type_id, DROP additional_fees');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE1A180200 FOREIGN KEY (property_status_id) REFERENCES property_status (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE9C81C6EB FOREIGN KEY (property_type_id) REFERENCES property_type (id)');
        $this->addSql('CREATE INDEX IDX_8BF21CDE9C81C6EB ON property (property_type_id)');
        $this->addSql('CREATE INDEX IDX_8BF21CDE1A180200 ON property (property_status_id)');
    }
}
