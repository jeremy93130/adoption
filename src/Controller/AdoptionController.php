<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\AnimauxRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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

    public function adoption(AnimauxRepository $animauxRepository, $id, UserRepository $adoptant, Request $request, SessionInterface $sessionInterface): Response
    {
        $adoption = $animauxRepository->findByid($id);

        return $this->render('adoption/adoption.html.twig', [
            'demande' => $adoption
        ]);
    }
}
