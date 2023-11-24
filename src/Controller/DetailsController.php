<?php

namespace App\Controller;

use App\Entity\DemandesAdoptions;
use App\Repository\AnimauxRepository;
use App\Repository\DemandesAdoptionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsController extends AbstractController
{
    #[Route('/details/{animalId}', name: 'app_details')]
    public function index(AnimauxRepository $animauxRepository, $animalId, DemandesAdoptionsRepository $demandesAdoptions): Response
    {
        $animal = $animauxRepository->find($animalId);

        if (!$animal) {
            $error_animal = "Aucun animal n'est disponible";
        }

        $demandes = $demandesAdoptions->findBy(['animal_id' => $animalId]);

        $count = count($demandes);

        return $this->render('details/details.html.twig', [
            'controller_name' => 'DetailsController',
            'animalChoisit' => $animal,
            'demandes' => $count,
        ]);
    }
}
