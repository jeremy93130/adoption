<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231127092558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux ADD regime_alimentaire VARCHAR(255) NOT NULL, CHANGE espece espece ENUM(\'chat\', \'chien\', \'oiseau\',\'rongeur\',\'reptile\'), CHANGE statut statut ENUM(\'disponible\', \'en attente\', \'adopté\'), CHANGE sexe sexe ENUM(\'Male\', \'Femelle\')');
        $this->addSql('ALTER TABLE demandes_adoptions DROP FOREIGN KEY FK_833FBC5D87852306');
        $this->addSql('ALTER TABLE demandes_adoptions DROP FOREIGN KEY FK_833FBC5D5EB747A3');
        $this->addSql('ALTER TABLE demandes_adoptions CHANGE type_exterieur type_exterieur ENUM(\'Terasse\', \'Balcon\',\'Jardin\')');
        $this->addSql('ALTER TABLE demandes_adoptions ADD CONSTRAINT FK_833FBC5D87852306 FOREIGN KEY (adoptant_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE demandes_adoptions ADD CONSTRAINT FK_833FBC5D5EB747A3 FOREIGN KEY (animal_id_id) REFERENCES animaux (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux DROP regime_alimentaire, CHANGE sexe sexe VARCHAR(255) DEFAULT NULL, CHANGE espece espece VARCHAR(255) DEFAULT NULL, CHANGE statut statut VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE demandes_adoptions DROP FOREIGN KEY FK_833FBC5D87852306');
        $this->addSql('ALTER TABLE demandes_adoptions DROP FOREIGN KEY FK_833FBC5D5EB747A3');
        $this->addSql('ALTER TABLE demandes_adoptions CHANGE type_exterieur type_exterieur VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE demandes_adoptions ADD CONSTRAINT FK_833FBC5D87852306 FOREIGN KEY (adoptant_id_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demandes_adoptions ADD CONSTRAINT FK_833FBC5D5EB747A3 FOREIGN KEY (animal_id_id) REFERENCES animaux (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
