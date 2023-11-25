<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231125133008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux CHANGE espece espece ENUM(\'chat\', \'chien\', \'oiseau\',\'rongeur\',\'reptile\'), CHANGE statut statut ENUM(\'disponible\', \'en attente\', \'adopté\'), CHANGE sexe sexe ENUM(\'Male\', \'Femelle\')');
        $this->addSql('ALTER TABLE demandes_adoptions CHANGE adoptant_id_id adoptant_id_id INT DEFAULT NULL, CHANGE animal_id_id animal_id_id INT DEFAULT NULL, CHANGE type_exterieur type_exterieur ENUM(\'Terasse\', \'Balcon\',\'Jardin\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux CHANGE sexe sexe VARCHAR(255) DEFAULT NULL, CHANGE espece espece VARCHAR(255) DEFAULT NULL, CHANGE statut statut VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE demandes_adoptions CHANGE adoptant_id_id adoptant_id_id INT NOT NULL, CHANGE animal_id_id animal_id_id INT NOT NULL, CHANGE type_exterieur type_exterieur VARCHAR(255) DEFAULT NULL');
    }
}
