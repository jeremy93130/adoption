<?php

namespace App\Controller;

use App\Repository\AnimauxRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(UserRepository $user, AnimauxRepository $animaux): Response
    {
        $adoptant = $user->findAll();
        $animal = $animaux->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            "adoptant" => $adoptant,
            "animaux" => $animal
        ]);
    }
}
