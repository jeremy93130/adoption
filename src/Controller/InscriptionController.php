<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterFormType::class, $user);
        $form->handleRequest($request);
        $plaintextPassword = $user->getMotDePasse();

        if ($form->isSubmitted() && $form->isValid()) {
            $hashedPassword = $passwordHasher->hashPassword($user, $plaintextPassword);
            $user->setMotDePasse($hashedPassword);
            $user->setRoles(['ROLE_USER']);
            $entityManagerInterface->persist($user);
            $entityManagerInterface->flush();

            return new RedirectResponse($this->generateUrl('app_login'));
        }



        return $this->render('inscription/inscription.html.twig', [
            'controller_name' => 'InscriptionController',
            'form' => $form->createView(),
            'isAppInscription' => true,
        ]);
    }
}
