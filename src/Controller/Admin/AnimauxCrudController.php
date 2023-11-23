<?php

namespace App\Controller\Admin;

use App\Entity\Animaux;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use PhpParser\Builder\Enum_;

class AnimauxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animaux::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            IntegerField::new('age'),
            IntegerField::new('taille'),
            IntegerField::new('poids'),
            TextareaField::new('description'),
            ImageField::new('image')->setBasePath('assets/images/')->setUploadDir('public/assets/images/')->setRequired(false),
            ChoiceField::new('espece')
                ->setChoices([
                    'chien' => "chien",
                    "chat" => "chat",
                    "oiseau" => "oiseau",
                    "rongeur" => "rongeur",
                    "reptile" => "reptile"
                ]),
            TextField::new('race'),
            ChoiceField::new('statut')
                ->setChoices([
                    "Disponible" => "disponible",
                    "En Attente" => "en attente",
                    "Adopté" => "adopté",
                ]),
            ChoiceField::new('sexe')
                ->setChoices([
                    "Male" => "Male",
                    "Femelle" => "Femelle"
                ])
        ];
    }
}
