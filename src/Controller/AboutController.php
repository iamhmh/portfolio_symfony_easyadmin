<?php

namespace App\Controller;

use App\Repository\ClientLogoRepository;
use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'app_about')]
    public function index(TeamRepository $teamRepository, ClientLogoRepository $clientLogoRepository): Response
    {
        $team = $teamRepository->findBy([], ['id' => 'ASC'], 6, 0);
        $clientLogo = $clientLogoRepository->findBy([], ['id' => 'ASC'], 6, 0);

        return $this->render('about/index.html.twig', [
            'teams' => $team,
            'clientLogos' => $clientLogo,
        ]);
    }
}
