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
    #[Route('/details/{id}', name: 'app_details')]
    public function index(AnimauxRepository $animauxRepository, $id, DemandesAdoptionsRepository $demandesAdoptions): Response
    {
        $demande = $demandesAdoptions->findAll();
        $count = count($demande);
        $animal = $animauxRepository->findByid($id);
        return $this->render('details/details.html.twig', [
            'controller_name' => 'DetailsController',
            'animalChoisit' => $animal,
            'demandes' => $count
        ]);
    }
}
