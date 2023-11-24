<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\AnimauxRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

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

    public function adoption(AnimauxRepository $animauxRepository, $id): Response
    {
        $adoption = $animauxRepository->findByid($id);
        if (!$this->getUser()) {
            $this->addFlash('error', 'Merci de vous inscrire ou de vous connecter !');
            return $this->redirectToRoute('app_login');
        }
        return $this->render('adoption/adoption.html.twig', [
            'demande' => $adoption
        ]);
    }
}
