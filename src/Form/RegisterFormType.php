<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Context\ExecutionContextInterface;


class RegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => false,
                'constraints' => [
                    new Assert\NotBlank(['message' => "Merci d'inscrire votre nom !"]),
                    new Assert\Length([
                        'min' => 1,
                        'max' => 150,
                        'minMessage' => 'Votre nom fait moins de 1 caractère? ;)',
                        'maxMessage' => 'Votre nom fait plus de 150 caractères? '
                    ]),
                ],
                'attr' => ['autofocus', 'placeholder' => 'Nom'],
            ])
            ->add('prenom', TextType::class, [
                'label' => false,
                'constraints' => [
                    new Assert\NotBlank(['message' => "Merci d'inscrire votre prénom !"]),
                    new Assert\Length([
                        'min' => 1,
                        'max' => "150",
                        'minMessage' => 'Votre prénom fait moins de 1 caractère? ;)',
                        'maxMessage' => 'Votre prénom fait plus de 150 caractères? '
                    ])
                ],
                'attr' => [
                    'placeholder' => 'Prénom',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'constraints' => [
                    new Assert\NotBlank(['message' => "L'email est requit"]),
                    new Assert\Email(["message" => "L'email n'est pas valide"]),
                ],
                'attr' => [
                    'placeholder' => 'Email@exemple.fr',
                ],
            ])
            ->add('mot_de_passe', PasswordType::class, [
                'label' => false,
                'attr' => [
                    'autocomplete' => 'off',
                    'placeholder' => 'Mot de Passe',
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                ]
            ])
            ->add('adresse', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Adresse',
                ],
            ])
            ->add('codePostal', TextType::class, [
                'label' => false,
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 5, 'max' => 10]),
                    new Assert\Regex([
                        'pattern' => '/^[0-9]{5}$/',
                        'message' => 'Le code postal doit être composé de 5 chiffres.',
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'Code Postal',
                ],
            ])
            ->add('pays', CountryType::class, [
                'label' => false,
                'constraints' => [
                    new Assert\Country()
                ],
            ])
            ->add('telephone', TextType::class, [
                'label' => false,
                'constraints' => [
                    new Assert\Length([
                        'min' => 10,
                        'exactMessage' => 'Le numéro de téléphone doit avoir 10 chiffres',
                    ]),
                    new Assert\Regex([
                        'pattern' => '/^0[1-9]([-. ]?[0-9]{2}){4}$/',
                        'message' => 'Le numéro de téléphone français n\'est pas valide.',
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'Numéro de téléphone',
                    'pattern' => '[0-9]*',
                ],
            ])
            ->add("inscription", SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
