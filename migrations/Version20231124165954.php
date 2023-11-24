<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231124165954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux CHANGE espece espece ENUM(\'chat\', \'chien\', \'oiseau\',\'rongeur\',\'reptile\'), CHANGE statut statut ENUM(\'disponible\', \'en attente\', \'adopté\'), CHANGE sexe sexe ENUM(\'Male\', \'Femelle\')');
        $this->addSql('ALTER TABLE demandes_adoptions ADD animal_id_id INT DEFAULT NULL, CHANGE statut statut ENUM(\'En attente\', \'Acceptée\', \'Refusée\')');
        $this->addSql('ALTER TABLE demandes_adoptions ADD CONSTRAINT FK_833FBC5D5EB747A3 FOREIGN KEY (animal_id_id) REFERENCES animaux (id)');
        $this->addSql('CREATE INDEX IDX_833FBC5D5EB747A3 ON demandes_adoptions (animal_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux CHANGE sexe sexe VARCHAR(255) DEFAULT NULL, CHANGE espece espece VARCHAR(255) DEFAULT NULL, CHANGE statut statut VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE demandes_adoptions DROP FOREIGN KEY FK_833FBC5D5EB747A3');
        $this->addSql('DROP INDEX IDX_833FBC5D5EB747A3 ON demandes_adoptions');
        $this->addSql('ALTER TABLE demandes_adoptions DROP animal_id_id, CHANGE statut statut VARCHAR(255) DEFAULT NULL');
    }
}
