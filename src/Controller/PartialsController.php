<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PartialsController extends AbstractController
{
    public function index_header(): Response
    {
        return $this->render('partials/header.html.twig', [
            'controller_name' => 'PartialsController',
        ]);
    }
    public function index_footer(): Response
    {
        return $this->render('partials/footer.html.twig', [
            'controller_name' => 'PartialsController',
        ]);
    }
    public function index_footer_empty(): Response
    {
        return $this->render('partials/empty_footer.html.twig', [
            'controller_name' => 'PartialsController',
        ]);
    }
}