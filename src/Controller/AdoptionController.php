<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\DemandesAdoptions;
use App\Form\InfosadoptionType;
use App\Repository\AnimauxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;

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

    public function adoption(AnimauxRepository $animauxRepository, $id, EntityManagerInterface $entityManager, Request $request): Response
    {
        $animalId = $animauxRepository->find($id);

        $adoption = new DemandesAdoptions();

        $form = $this->createForm(InfosadoptionType::class, $adoption);

        $form->handleRequest($request);

        try {

            if ($form->isSubmitted() && $form->isValid()) {
                // Accédez aux données soumises
                $data = $form->getData();

                $user = $this->getUser();

                if ($user instanceof User) {
                    // Votre code ici
                    $adoptionDemande = $adoption
                        ->setAdoptantId($user)
                        ->setAnimalId($animalId)
                        ->setDateDemande(new \DateTime)
                        ->setStatut('En Attente');

                    $entityManager->persist($adoptionDemande);
                    $entityManager->flush();
                } else {
                    $this->redirectToRoute('app_login', ['erreur_session' => "Vous n'êtes pas connecté ! "]);
                }

                if (!$this->getUser()) {
                    $this->addFlash('error', 'Merci de vous inscrire ou de vous connecter !');
                    return $this->redirectToRoute('app_login');
                }

                // Faites quelque chose avec les données, par exemple, persistez-les en base de données
                $entityManager->persist($adoption);
                $entityManager->flush();

                // Redirigez l'utilisateur vers une autre page ou faites quelque chose d'autre
                return $this->redirectToRoute('app_home', ['Message_adoption' => "Demande Bien enregistrée"]);
            }
        } catch (\Exception $e) {
            $this->addFlash("error_champs", "une erreur s'est produite , merci de remplir tous les champs !");
        }

        return $this->render('adoption/adoption.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
