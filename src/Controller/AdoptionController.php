<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\DemandesAdoptions;
use App\Repository\AnimauxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AdoptionController extends AbstractController
{
    #[Route('/adoption', name: 'app_adoption')]
    public function index(): Response
    {
        return $this->render('adoption/adoption.html.twig', [
            'controller_name' => 'AdoptionController',
        ]);
    }

    #[Route('/adoption/{id}', name: 'app_adopte')]

    public function adoption(AnimauxRepository $animauxRepository, $id, EntityManagerInterface $entityManager): Response
    {
        $adoption = $animauxRepository->find($id);
        $user = $this->getUser();

        if ($user instanceof User) {
            // Votre code ici
            $demande = new DemandesAdoptions();
            $adoptionDemande = $demande
                ->setAdoptantId($user)
                ->setAnimalId($adoption)
                ->setDateDemande(new \DateTime)
                ->setStatut('En Attente');

            $entityManager->persist($adoptionDemande);
            $entityManager->flush();
        } else {
            // L'utilisateur n'est pas connecté ou n'est pas une instance de User
        }

        if (!$this->getUser()) {
            $this->addFlash('error', 'Merci de vous inscrire ou de vous connecter !');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('adoption/adoption.html.twig', [
            'demande' => $adoption
        ]);
    }
}
