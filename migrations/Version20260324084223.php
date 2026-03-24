<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260324084223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(120) NOT NULL, image VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_64C19C1989D9B62 (slug), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE order_subscription (id INT AUTO_INCREMENT NOT NULL, duration VARCHAR(50) NOT NULL, quantity INT NOT NULL, unit_price NUMERIC(10, 2) NOT NULL, status VARCHAR(50) NOT NULL, user_order_id INT NOT NULL, saas_product_id INT NOT NULL, INDEX IDX_A706F0B96D128938 (user_order_id), INDEX IDX_A706F0B91CD9AA7C (saas_product_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE payment_token (id INT AUTO_INCREMENT NOT NULL, provider VARCHAR(100) NOT NULL, provider_token VARCHAR(255) NOT NULL, last_four_digits VARCHAR(4) NOT NULL, is_default TINYINT NOT NULL, user_id INT NOT NULL, INDEX IDX_87E9789A76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, slug VARCHAR(160) NOT NULL, description LONGTEXT DEFAULT NULL, price NUMERIC(10, 2) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, featured TINYINT DEFAULT 0 NOT NULL, category_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_D34A04AD989D9B62 (slug), INDEX IDX_D34A04AD12469DE2 (category_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE saas_product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, technical_characteristics JSON NOT NULL, base_price NUMERIC(10, 2) NOT NULL, pricing_model VARCHAR(50) NOT NULL, status VARCHAR(50) NOT NULL, priority INT NOT NULL, deleted_at DATETIME DEFAULT NULL, category_id INT NOT NULL, INDEX IDX_8C70767412469DE2 (category_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, full_name VARCHAR(255) NOT NULL, is_verified TINYINT NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user_address (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, line1 VARCHAR(255) NOT NULL, line2 VARCHAR(255) DEFAULT NULL, city VARCHAR(100) NOT NULL, region VARCHAR(100) DEFAULT NULL, zip VARCHAR(20) NOT NULL, country VARCHAR(100) NOT NULL, phone VARCHAR(50) DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, user_id INT NOT NULL, INDEX IDX_5543718BA76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user_order (id INT AUTO_INCREMENT NOT NULL, total_amount NUMERIC(10, 2) NOT NULL, status VARCHAR(50) NOT NULL, invoice_pdf_url VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, user_id INT NOT NULL, billing_address_id INT NOT NULL, INDEX IDX_17EB68C0A76ED395 (user_id), INDEX IDX_17EB68C079D0C0E4 (billing_address_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE order_subscription ADD CONSTRAINT FK_A706F0B96D128938 FOREIGN KEY (user_order_id) REFERENCES user_order (id)');
        $this->addSql('ALTER TABLE order_subscription ADD CONSTRAINT FK_A706F0B91CD9AA7C FOREIGN KEY (saas_product_id) REFERENCES saas_product (id)');
        $this->addSql('ALTER TABLE payment_token ADD CONSTRAINT FK_87E9789A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE saas_product ADD CONSTRAINT FK_8C70767412469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE user_address ADD CONSTRAINT FK_5543718BA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE user_order ADD CONSTRAINT FK_17EB68C0A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE user_order ADD CONSTRAINT FK_17EB68C079D0C0E4 FOREIGN KEY (billing_address_id) REFERENCES user_address (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_subscription DROP FOREIGN KEY FK_A706F0B96D128938');
        $this->addSql('ALTER TABLE order_subscription DROP FOREIGN KEY FK_A706F0B91CD9AA7C');
        $this->addSql('ALTER TABLE payment_token DROP FOREIGN KEY FK_87E9789A76ED395');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE saas_product DROP FOREIGN KEY FK_8C70767412469DE2');
        $this->addSql('ALTER TABLE user_address DROP FOREIGN KEY FK_5543718BA76ED395');
        $this->addSql('ALTER TABLE user_order DROP FOREIGN KEY FK_17EB68C0A76ED395');
        $this->addSql('ALTER TABLE user_order DROP FOREIGN KEY FK_17EB68C079D0C0E4');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE order_subscription');
        $this->addSql('DROP TABLE payment_token');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE saas_product');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_address');
        $this->addSql('DROP TABLE user_order');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
