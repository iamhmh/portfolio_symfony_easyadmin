<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    #[Route('/projects-grid', name: 'app_project_grid')]
    public function projects_grid(): Response
    {
        return $this->render('project/projects-grid.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
    #[Route('/projects-slider', name: 'app_project_slider')]
    public function projects_slider(): Response
    {
        return $this->render('project/projects-slider.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
    #[Route('/project-single', name: 'app_project_single')]
    public function project_single(): Response
    {
        return $this->render('project/project-single.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
    #[Route('/project-single-alt', name: 'app_project_single_alt')]
    public function project_single_alt(): Response
    {
        return $this->render('project/projects-single-alt.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
    #[Route('/project-single-hero', name: 'app_project_single_hero')]
    public function project_single_hero(): Response
    {
        return $this->render('project/project-single-hero.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
    #[Route('/projects-lightbox', name: 'app_project_lightbox')]
    public function projects_lightbox(): Response
    {
        return $this->render('project/projects-lightbox.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
}
