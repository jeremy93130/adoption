<?php

namespace App\Controller;

use App\Repository\AnimauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieAnimalController extends AbstractController
{
    #[Route('/categorie/animal', name: 'app_categorie_animal')]
    public function index(): Response
    {
        return $this->render('categorie_animal/categorie.html.twig', [
            'controller_name' => 'CategorieAnimalController',
        ]);
    }


    #[Route('/categorie/animal/{categorie}', name: 'app_categorie')]
    public function categorie(AnimauxRepository $animauxRepository, $categorie): Response
    {
        $espece = $animauxRepository->findByCategorie($categorie);

        return $this->render('categorie_animal/categorie.html.twig', [
            'especes' => $espece,
            'categorie' => $categorie
        ]);
    }
}
