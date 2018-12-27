<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181227105724 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE property_property_features DROP FOREIGN KEY FK_188B5A2071AD5033');
        $this->addSql('CREATE TABLE property_property_feature (property_id INT NOT NULL, property_feature_id INT NOT NULL, INDEX IDX_33772782549213EC (property_id), INDEX IDX_33772782D545984A (property_feature_id), PRIMARY KEY(property_id, property_feature_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property_feature (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE property_property_feature ADD CONSTRAINT FK_33772782549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE property_property_feature ADD CONSTRAINT FK_33772782D545984A FOREIGN KEY (property_feature_id) REFERENCES property_feature (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE property_features');
        $this->addSql('DROP TABLE property_property_features');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE property_property_feature DROP FOREIGN KEY FK_33772782D545984A');
        $this->addSql('CREATE TABLE property_features (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE property_property_features (property_id INT NOT NULL, property_features_id INT NOT NULL, INDEX IDX_188B5A20549213EC (property_id), INDEX IDX_188B5A2071AD5033 (property_features_id), PRIMARY KEY(property_id, property_features_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE property_property_features ADD CONSTRAINT FK_188B5A20549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE property_property_features ADD CONSTRAINT FK_188B5A2071AD5033 FOREIGN KEY (property_features_id) REFERENCES property_features (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE property_property_feature');
        $this->addSql('DROP TABLE property_feature');
    }
}
