<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230509134120 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ergonomics (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE local_rooms (id INT AUTO_INCREMENT NOT NULL, room_capacity VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE local_rooms_ergonomics (local_rooms_id INT NOT NULL, ergonomics_id INT NOT NULL, INDEX IDX_607798A71DB74233 (local_rooms_id), INDEX IDX_607798A7EB3269B9 (ergonomics_id), PRIMARY KEY(local_rooms_id, ergonomics_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE local_rooms_material (local_rooms_id INT NOT NULL, material_id INT NOT NULL, INDEX IDX_2C85E0131DB74233 (local_rooms_id), INDEX IDX_2C85E013E308AC6F (material_id), PRIMARY KEY(local_rooms_id, material_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE local_rooms_software (local_rooms_id INT NOT NULL, software_id INT NOT NULL, INDEX IDX_27EBFD491DB74233 (local_rooms_id), INDEX IDX_27EBFD49D7452741 (software_id), PRIMARY KEY(local_rooms_id, software_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE material (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, disponibility INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pre_reservation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pre_reservation_user (pre_reservation_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_34D851EDEE7B9CAF (pre_reservation_id), INDEX IDX_34D851EDA76ED395 (user_id), PRIMARY KEY(pre_reservation_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, status VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_local_rooms (reservation_id INT NOT NULL, local_rooms_id INT NOT NULL, INDEX IDX_AF2B5BCEB83297E7 (reservation_id), INDEX IDX_AF2B5BCE1DB74233 (local_rooms_id), PRIMARY KEY(reservation_id, local_rooms_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_user (reservation_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_9BAA1B21B83297E7 (reservation_id), INDEX IDX_9BAA1B21A76ED395 (user_id), PRIMARY KEY(reservation_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE software (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE local_rooms_ergonomics ADD CONSTRAINT FK_607798A71DB74233 FOREIGN KEY (local_rooms_id) REFERENCES local_rooms (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE local_rooms_ergonomics ADD CONSTRAINT FK_607798A7EB3269B9 FOREIGN KEY (ergonomics_id) REFERENCES ergonomics (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE local_rooms_material ADD CONSTRAINT FK_2C85E0131DB74233 FOREIGN KEY (local_rooms_id) REFERENCES local_rooms (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE local_rooms_material ADD CONSTRAINT FK_2C85E013E308AC6F FOREIGN KEY (material_id) REFERENCES material (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE local_rooms_software ADD CONSTRAINT FK_27EBFD491DB74233 FOREIGN KEY (local_rooms_id) REFERENCES local_rooms (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE local_rooms_software ADD CONSTRAINT FK_27EBFD49D7452741 FOREIGN KEY (software_id) REFERENCES software (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pre_reservation_user ADD CONSTRAINT FK_34D851EDEE7B9CAF FOREIGN KEY (pre_reservation_id) REFERENCES pre_reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pre_reservation_user ADD CONSTRAINT FK_34D851EDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_local_rooms ADD CONSTRAINT FK_AF2B5BCEB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_local_rooms ADD CONSTRAINT FK_AF2B5BCE1DB74233 FOREIGN KEY (local_rooms_id) REFERENCES local_rooms (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_user ADD CONSTRAINT FK_9BAA1B21B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_user ADD CONSTRAINT FK_9BAA1B21A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE local_rooms_ergonomics DROP FOREIGN KEY FK_607798A71DB74233');
        $this->addSql('ALTER TABLE local_rooms_ergonomics DROP FOREIGN KEY FK_607798A7EB3269B9');
        $this->addSql('ALTER TABLE local_rooms_material DROP FOREIGN KEY FK_2C85E0131DB74233');
        $this->addSql('ALTER TABLE local_rooms_material DROP FOREIGN KEY FK_2C85E013E308AC6F');
        $this->addSql('ALTER TABLE local_rooms_software DROP FOREIGN KEY FK_27EBFD491DB74233');
        $this->addSql('ALTER TABLE local_rooms_software DROP FOREIGN KEY FK_27EBFD49D7452741');
        $this->addSql('ALTER TABLE pre_reservation_user DROP FOREIGN KEY FK_34D851EDEE7B9CAF');
        $this->addSql('ALTER TABLE pre_reservation_user DROP FOREIGN KEY FK_34D851EDA76ED395');
        $this->addSql('ALTER TABLE reservation_local_rooms DROP FOREIGN KEY FK_AF2B5BCEB83297E7');
        $this->addSql('ALTER TABLE reservation_local_rooms DROP FOREIGN KEY FK_AF2B5BCE1DB74233');
        $this->addSql('ALTER TABLE reservation_user DROP FOREIGN KEY FK_9BAA1B21B83297E7');
        $this->addSql('ALTER TABLE reservation_user DROP FOREIGN KEY FK_9BAA1B21A76ED395');
        $this->addSql('DROP TABLE ergonomics');
        $this->addSql('DROP TABLE local_rooms');
        $this->addSql('DROP TABLE local_rooms_ergonomics');
        $this->addSql('DROP TABLE local_rooms_material');
        $this->addSql('DROP TABLE local_rooms_software');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE pre_reservation');
        $this->addSql('DROP TABLE pre_reservation_user');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_local_rooms');
        $this->addSql('DROP TABLE reservation_user');
        $this->addSql('DROP TABLE software');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
