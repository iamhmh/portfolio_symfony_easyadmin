<?php

namespace App\Controller;

use App\Repository\ProjectImageRepository;
use App\Repository\ProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    #[Route('/projects-grid', name: 'app_project_grid')]
    public function projects_grid(ProjectsRepository $projectsRepository, ProjectImageRepository $projectImageRepository): Response
    {
        $projects = $projectsRepository->findBy([], ['id' => 'ASC'], 9, 0);
        $projectImages = $projectImageRepository->findBy([], ['id' => 'ASC'], 9, 0);

        return $this->render('project/projects-grid.html.twig', [
            'projects' => $projects,
            'projectImages' => $projectImages,
        ]);
    }
    #[Route('/projects-slider', name: 'app_project_slider')]
    public function projects_slider(ProjectsRepository $projectsRepository, ProjectImageRepository $projectImageRepository): Response
    {
        $projects = $projectsRepository->findBy([], ['id' => 'ASC'], 4, 0);
        $projectImages = $projectImageRepository->findBy([], ['id' => 'ASC'], 4, 0);

        return $this->render('project/projects-slider.html.twig', [
            'projects' => $projects,
            'projectImages' => $projectImages,
        ]);
    }
    #[Route('/projects-lightbox', name: 'app_project_lightbox')]
    public function projects_lightbox(ProjectsRepository $projectsRepository, ProjectImageRepository $projectImageRepository): Response
    {
        $projects = $projectsRepository->findBy([], ['id' => 'ASC'], 8, 0);
        $projectImages = $projectImageRepository->findBy([], ['id' => 'ASC'], 8, 0);

        return $this->render('project/projects-lightbox.html.twig', [
            'projects' => $projects,
            'projectImages' => $projectImages,
        ]);
    }
    #[Route('/project-single', name: 'app_project_single')]
    public function project_single(ProjectsRepository $projectsRepository, ProjectImageRepository $projectImageRepository): Response
    {
        $projects = $projectsRepository->findBy([], ['id' => 'ASC'], 1, 0);
        $projectImages = $projectImageRepository->findBy([], ['id' => 'ASC'], 1, 0);

        return $this->render('project/project-single.html.twig', [
            'projects' => $projects,
            'projectImages' => $projectImages,
        ]);
    }
    #[Route('/project-single-alt', name: 'app_project_single_alt')]
    public function project_single_alt(ProjectsRepository $projectsRepository, ProjectImageRepository $projectImageRepository): Response
    {
        $projects = $projectsRepository->findBy([], ['id' => 'ASC'], 1, 0);
        $projectImages = $projectImageRepository->findBy([], ['id' => 'ASC'], 1, 0);

        return $this->render('project/projects-single-alt.html.twig', [
            'projects' => $projects,
            'projectImages' => $projectImages,
        ]);
    }
    #[Route('/project-single-hero', name: 'app_project_single_hero')]
    public function project_single_hero(ProjectsRepository $projectsRepository, ProjectImageRepository $projectImageRepository): Response
    {
        $projects = $projectsRepository->findBy([], ['id' => 'ASC'], 1, 0);
        $projectImages = $projectImageRepository->findBy([], ['id' => 'ASC'], 1, 0);

        return $this->render('project/project-single-hero.html.twig', [
            'projects' => $projects,
            'projectImages' => $projectImages,
        ]);
    }
}
