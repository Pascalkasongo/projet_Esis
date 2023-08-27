<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230827134513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260D60322AC');
        $this->addSql('DROP INDEX IDX_CFF65260D60322AC ON compte');
        $this->addSql('ALTER TABLE compte DROP role_id');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6AF2C56620');
        $this->addSql('DROP INDEX IDX_57698A6AF2C56620 ON role');
        $this->addSql('ALTER TABLE role DROP compte_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte ADD role_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_CFF65260D60322AC ON compte (role_id)');
        $this->addSql('ALTER TABLE role ADD compte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6AF2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('CREATE INDEX IDX_57698A6AF2C56620 ON role (compte_id)');
    }
}
