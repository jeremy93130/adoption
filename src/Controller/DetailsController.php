<?php

namespace App\Controller;

use App\Repository\AnimauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsController extends AbstractController
{
    #[Route('/details/{id}', name: 'app_details')]
    public function index(AnimauxRepository $animauxRepository, $id): Response
    {
        $animal = $animauxRepository->findByid($id);
        return $this->render('details/details.html.twig', [
            'controller_name' => 'DetailsController',
            'animalChoisit' => $animal
        ]);
    }
}
