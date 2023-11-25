<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231125130037 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux CHANGE espece espece ENUM(\'chat\', \'chien\', \'oiseau\',\'rongeur\',\'reptile\'), CHANGE statut statut ENUM(\'disponible\', \'en attente\', \'adopté\'), CHANGE sexe sexe ENUM(\'Male\', \'Femelle\')');
        $this->addSql('ALTER TABLE demandes_adoptions ADD situation_familiale ENUM(\'Celibataire\', \'En couple\'), ADD nombre_enfants INT NOT NULL, ADD type_habitat ENUM(\'Maison\', \'Appartement\'), ADD exterieur_interieur ENUM(\'Oui\',\'Non\'), ADD type_exterieur ENUM(\'Terasse\', \'Balcon\',\'Jardin\'), ADD autre_animal ENUM(\'Oui\', \'Non\'), ADD etage INT NOT NULL, CHANGE statut statut ENUM(\'En attente\', \'Acceptée\', \'Refusée\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux CHANGE sexe sexe VARCHAR(255) DEFAULT NULL, CHANGE espece espece VARCHAR(255) DEFAULT NULL, CHANGE statut statut VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE demandes_adoptions DROP situation_familiale, DROP nombre_enfants, DROP type_habitat, DROP exterieur_interieur, DROP type_exterieur, DROP autre_animal, DROP etage, CHANGE statut statut VARCHAR(255) DEFAULT NULL');
    }
}
