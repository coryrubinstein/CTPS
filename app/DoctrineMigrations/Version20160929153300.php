<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160929153300 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Issues (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, class VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IssuesReason (id INT AUTO_INCREMENT NOT NULL, issue_id INT DEFAULT NULL, reason_id INT DEFAULT NULL, INDEX IDX_DEC88F0D5E7AA58C (issue_id), INDEX IDX_DEC88F0D59BB1592 (reason_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IssueReasonSubReason (id INT AUTO_INCREMENT NOT NULL, sub_reason_id INT DEFAULT NULL, issue_reason_id INT DEFAULT NULL, INDEX IDX_75A7EBA34BB6532C (sub_reason_id), INDEX IDX_75A7EBA31868C7D8 (issue_reason_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ModulesFamily (id INT AUTO_INCREMENT NOT NULL, moduleFamily VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Reason (id INT AUTO_INCREMENT NOT NULL, family INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_3C148D3AA5E6215B (family), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SubReason (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE temp (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE IssuesReason ADD CONSTRAINT FK_DEC88F0D5E7AA58C FOREIGN KEY (issue_id) REFERENCES Issues (id)');
        $this->addSql('ALTER TABLE IssuesReason ADD CONSTRAINT FK_DEC88F0D59BB1592 FOREIGN KEY (reason_id) REFERENCES Reason (id)');
        $this->addSql('ALTER TABLE IssueReasonSubReason ADD CONSTRAINT FK_75A7EBA34BB6532C FOREIGN KEY (sub_reason_id) REFERENCES SubReason (id)');
        $this->addSql('ALTER TABLE IssueReasonSubReason ADD CONSTRAINT FK_75A7EBA31868C7D8 FOREIGN KEY (issue_reason_id) REFERENCES IssuesReason (id)');
        $this->addSql('ALTER TABLE Reason ADD CONSTRAINT FK_3C148D3AA5E6215B FOREIGN KEY (family) REFERENCES ModulesFamily (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE IssuesReason DROP FOREIGN KEY FK_DEC88F0D5E7AA58C');
        $this->addSql('ALTER TABLE IssueReasonSubReason DROP FOREIGN KEY FK_75A7EBA31868C7D8');
        $this->addSql('ALTER TABLE Reason DROP FOREIGN KEY FK_3C148D3AA5E6215B');
        $this->addSql('ALTER TABLE IssuesReason DROP FOREIGN KEY FK_DEC88F0D59BB1592');
        $this->addSql('ALTER TABLE IssueReasonSubReason DROP FOREIGN KEY FK_75A7EBA34BB6532C');
        $this->addSql('DROP TABLE Issues');
        $this->addSql('DROP TABLE IssuesReason');
        $this->addSql('DROP TABLE IssueReasonSubReason');
        $this->addSql('DROP TABLE ModulesFamily');
        $this->addSql('DROP TABLE Reason');
        $this->addSql('DROP TABLE SubReason');
        $this->addSql('DROP TABLE temp');
    }
}
