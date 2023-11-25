<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231125132827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux CHANGE espece espece ENUM(\'chat\', \'chien\', \'oiseau\',\'rongeur\',\'reptile\'), CHANGE statut statut ENUM(\'disponible\', \'en attente\', \'adopté\'), CHANGE sexe sexe ENUM(\'Male\', \'Femelle\')');
        $this->addSql('ALTER TABLE demandes_adoptions CHANGE statut statut ENUM(\'En attente\', \'Acceptée\', \'Refusée\'), CHANGE situation_familiale situation_familiale ENUM(\'Celibataire\', \'En couple\'), CHANGE type_habitat type_habitat ENUM(\'Maison\', \'Appartement\'), CHANGE exterieur_interieur exterieur_interieur ENUM(\'Oui\',\'Non\'), CHANGE type_exterieur type_exterieur ENUM(\'Terasse\', \'Balcon\',\'Jardin\'), CHANGE autre_animal autre_animal ENUM(\'Oui\', \'Non\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux CHANGE sexe sexe VARCHAR(255) DEFAULT NULL, CHANGE espece espece VARCHAR(255) DEFAULT NULL, CHANGE statut statut VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE demandes_adoptions CHANGE statut statut VARCHAR(255) DEFAULT NULL, CHANGE situation_familiale situation_familiale VARCHAR(255) DEFAULT NULL, CHANGE type_habitat type_habitat VARCHAR(255) DEFAULT NULL, CHANGE exterieur_interieur exterieur_interieur VARCHAR(255) DEFAULT NULL, CHANGE type_exterieur type_exterieur VARCHAR(255) DEFAULT NULL, CHANGE autre_animal autre_animal VARCHAR(255) DEFAULT NULL');
    }
}
