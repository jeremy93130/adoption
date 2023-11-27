<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231127150204 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animaux_user (animaux_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_19AA9335A9DAECAA (animaux_id), INDEX IDX_19AA9335A76ED395 (user_id), PRIMARY KEY(animaux_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animaux_user ADD CONSTRAINT FK_19AA9335A9DAECAA FOREIGN KEY (animaux_id) REFERENCES animaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animaux_user ADD CONSTRAINT FK_19AA9335A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animaux CHANGE espece espece ENUM(\'chat\', \'chien\', \'oiseau\',\'rongeur\',\'reptile\'), CHANGE statut statut ENUM(\'disponible\', \'en attente\', \'adopté\'), CHANGE sexe sexe ENUM(\'Male\', \'Femelle\')');
        $this->addSql('ALTER TABLE demandes_adoptions CHANGE type_exterieur type_exterieur ENUM(\'Terasse\', \'Balcon\',\'Jardin\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animaux_user DROP FOREIGN KEY FK_19AA9335A9DAECAA');
        $this->addSql('ALTER TABLE animaux_user DROP FOREIGN KEY FK_19AA9335A76ED395');
        $this->addSql('DROP TABLE animaux_user');
        $this->addSql('ALTER TABLE animaux CHANGE sexe sexe VARCHAR(255) DEFAULT NULL, CHANGE espece espece VARCHAR(255) DEFAULT NULL, CHANGE statut statut VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE demandes_adoptions CHANGE type_exterieur type_exterieur VARCHAR(255) DEFAULT NULL');
    }
}
