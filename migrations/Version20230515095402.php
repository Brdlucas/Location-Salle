<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230515095402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rooms DROP FOREIGN KEY FK_7CA11A9666B6F0BA');
        $this->addSql('ALTER TABLE rooms DROP FOREIGN KEY FK_7CA11A96F5CFA4CB');
        $this->addSql('ALTER TABLE rooms DROP FOREIGN KEY FK_7CA11A9616880AAF');
        $this->addSql('CREATE TABLE ergonomics (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE material (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rooms_material (rooms_id INT NOT NULL, material_id INT NOT NULL, INDEX IDX_9BB633C28E2368AB (rooms_id), INDEX IDX_9BB633C2E308AC6F (material_id), PRIMARY KEY(rooms_id, material_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rooms_ergonomics (rooms_id INT NOT NULL, ergonomics_id INT NOT NULL, INDEX IDX_E78E58A48E2368AB (rooms_id), INDEX IDX_E78E58A4EB3269B9 (ergonomics_id), PRIMARY KEY(rooms_id, ergonomics_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rooms_software (rooms_id INT NOT NULL, software_id INT NOT NULL, INDEX IDX_90D82E988E2368AB (rooms_id), INDEX IDX_90D82E98D7452741 (software_id), PRIMARY KEY(rooms_id, software_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rooms_material ADD CONSTRAINT FK_9BB633C28E2368AB FOREIGN KEY (rooms_id) REFERENCES rooms (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rooms_material ADD CONSTRAINT FK_9BB633C2E308AC6F FOREIGN KEY (material_id) REFERENCES material (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rooms_ergonomics ADD CONSTRAINT FK_E78E58A48E2368AB FOREIGN KEY (rooms_id) REFERENCES rooms (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rooms_ergonomics ADD CONSTRAINT FK_E78E58A4EB3269B9 FOREIGN KEY (ergonomics_id) REFERENCES ergonomics (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rooms_software ADD CONSTRAINT FK_90D82E988E2368AB FOREIGN KEY (rooms_id) REFERENCES rooms (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rooms_software ADD CONSTRAINT FK_90D82E98D7452741 FOREIGN KEY (software_id) REFERENCES software (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE capacity');
        $this->addSql('DROP TABLE ergonomic');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('ALTER TABLE rooms DROP FOREIGN KEY FK_7CA11A96D7452741');
        $this->addSql('DROP INDEX IDX_7CA11A9666B6F0BA ON rooms');
        $this->addSql('DROP INDEX IDX_7CA11A96F5CFA4CB ON rooms');
        $this->addSql('DROP INDEX IDX_7CA11A9616880AAF ON rooms');
        $this->addSql('DROP INDEX IDX_7CA11A96D7452741 ON rooms');
        $this->addSql('ALTER TABLE rooms ADD capacity VARCHAR(255) NOT NULL, DROP capacity_id, DROP ergonomic_id, DROP materiel_id, DROP software_id, CHANGE description description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE software CHANGE name name VARCHAR(50) NOT NULL, CHANGE description description LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE capacity (id INT AUTO_INCREMENT NOT NULL, people_number INT NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ergonomic (id INT AUTO_INCREMENT NOT NULL, surface DOUBLE PRECISION NOT NULL, sun_light TINYINT(1) NOT NULL, artificial_light TINYINT(1) NOT NULL, pmr TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, disponibility INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE rooms_material DROP FOREIGN KEY FK_9BB633C28E2368AB');
        $this->addSql('ALTER TABLE rooms_material DROP FOREIGN KEY FK_9BB633C2E308AC6F');
        $this->addSql('ALTER TABLE rooms_ergonomics DROP FOREIGN KEY FK_E78E58A48E2368AB');
        $this->addSql('ALTER TABLE rooms_ergonomics DROP FOREIGN KEY FK_E78E58A4EB3269B9');
        $this->addSql('ALTER TABLE rooms_software DROP FOREIGN KEY FK_90D82E988E2368AB');
        $this->addSql('ALTER TABLE rooms_software DROP FOREIGN KEY FK_90D82E98D7452741');
        $this->addSql('DROP TABLE ergonomics');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE rooms_material');
        $this->addSql('DROP TABLE rooms_ergonomics');
        $this->addSql('DROP TABLE rooms_software');
        $this->addSql('ALTER TABLE rooms ADD capacity_id INT NOT NULL, ADD ergonomic_id INT NOT NULL, ADD materiel_id INT DEFAULT NULL, ADD software_id INT DEFAULT NULL, DROP capacity, CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE rooms ADD CONSTRAINT FK_7CA11A9616880AAF FOREIGN KEY (materiel_id) REFERENCES materiel (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE rooms ADD CONSTRAINT FK_7CA11A9666B6F0BA FOREIGN KEY (capacity_id) REFERENCES capacity (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE rooms ADD CONSTRAINT FK_7CA11A96D7452741 FOREIGN KEY (software_id) REFERENCES software (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE rooms ADD CONSTRAINT FK_7CA11A96F5CFA4CB FOREIGN KEY (ergonomic_id) REFERENCES ergonomic (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_7CA11A9666B6F0BA ON rooms (capacity_id)');
        $this->addSql('CREATE INDEX IDX_7CA11A96F5CFA4CB ON rooms (ergonomic_id)');
        $this->addSql('CREATE INDEX IDX_7CA11A9616880AAF ON rooms (materiel_id)');
        $this->addSql('CREATE INDEX IDX_7CA11A96D7452741 ON rooms (software_id)');
        $this->addSql('ALTER TABLE software CHANGE name name VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL');
    }
}
