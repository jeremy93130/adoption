<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231127145937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C487852306');
        $this->addSql('ALTER TABLE commentaires_animaux DROP FOREIGN KEY FK_7822415B17C4B2B0');
        $this->addSql('ALTER TABLE commentaires_animaux DROP FOREIGN KEY FK_7822415BA9DAECAA');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('DROP TABLE commentaires_animaux');
        $this->addSql('ALTER TABLE animaux CHANGE espece espece ENUM(\'chat\', \'chien\', \'oiseau\',\'rongeur\',\'reptile\'), CHANGE statut statut ENUM(\'disponible\', \'en attente\', \'adopté\'), CHANGE sexe sexe ENUM(\'Male\', \'Femelle\')');
        $this->addSql('ALTER TABLE demandes_adoptions CHANGE type_exterieur type_exterieur ENUM(\'Terasse\', \'Balcon\',\'Jardin\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaires (id INT AUTO_INCREMENT NOT NULL, adoptant_id_id INT NOT NULL, commentaire LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, date_commentaire DATE NOT NULL, INDEX IDX_D9BEC0C487852306 (adoptant_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commentaires_animaux (commentaires_id INT NOT NULL, animaux_id INT NOT NULL, INDEX IDX_7822415B17C4B2B0 (commentaires_id), INDEX IDX_7822415BA9DAECAA (animaux_id), PRIMARY KEY(commentaires_id, animaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C487852306 FOREIGN KEY (adoptant_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaires_animaux ADD CONSTRAINT FK_7822415B17C4B2B0 FOREIGN KEY (commentaires_id) REFERENCES commentaires (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaires_animaux ADD CONSTRAINT FK_7822415BA9DAECAA FOREIGN KEY (animaux_id) REFERENCES animaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animaux CHANGE sexe sexe VARCHAR(255) DEFAULT NULL, CHANGE espece espece VARCHAR(255) DEFAULT NULL, CHANGE statut statut VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE demandes_adoptions CHANGE type_exterieur type_exterieur VARCHAR(255) DEFAULT NULL');
    }
}
