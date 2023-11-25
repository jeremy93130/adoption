<?php

namespace App\Form;

use App\Entity\DemandesAdoptions;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfosadoptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Situation_familiale', ChoiceType::class, [
                'choices' => [
                    'Choisissez' => null,
                    'Célibataire' => 'Celibataire',
                    'en couple' => 'En couple'
                ],
                'label' => 'Quelle est votre situation familiale'
            ])
            ->add('Nombre_enfants', NumberType::class, [])
            ->add('Type_Habitat', ChoiceType::class, [
                'choices' => [
                    'Choisissez' => null,
                    'Maison' => "Maison",
                    'Appartement' => 'Appartement'
                ],
                'label' => 'Vous habitez dans :'
            ])
            ->add('Exterieur_interieur', ChoiceType::class, [
                'choices' => [
                    'Choisissez' => null,
                    'Oui'=> 'Oui',
                    'Non' => 'Non'
                ],
                'label' => "Y'a t-il un accès à l'exterieur?"
            ])
            ->add('Type_Exterieur', ChoiceType::class, [
                'choices' => [
                    'Choisissez' => null,
                    'Terasse' => 'Terasse',
                    'Balcon' => "Balcon",
                    'Jardin' => 'Jardin'
                ],
                'label' => "Si accès exterieur , répondez , quel type d'exterieur?"
            ])
            ->add('Autre_animal', ChoiceType::class, [
                'choices' => [
                    'Choisissez' => null,
                    'Oui' => 'Oui', 
                    'Non' => 'Non'
                ],
                'label' => "Possedez vous un autre animal?"
            ])
            ->add('Etage', NumberType::class)
            ->add('Submit', SubmitType::class,[
                'label'=> 'Soumettre le formulaire'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DemandesAdoptions::class,
        ]);
    }
}
