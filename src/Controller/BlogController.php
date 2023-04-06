<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog-slider')]
    public function blog_slider(): Response
    {
        return $this->render('blog/blog-slider.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
    #[Route('/blog-single', name: 'blog-single')]
    public function blog_single(): Response
    {
        return $this->render('blog/blog-single.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/blog-single-alt', name: 'blog-single-alt')]
    public function blog_single_alt(): Response
    {
        return $this->render('blog/blog-single-alt.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/blog-single-hero', name: 'blog-single-hero')]
    public function blog_single_hero(): Response
    {
        return $this->render('blog/blog-single-hero.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/blog-grid', name: 'blog-grid')]
    public function blog_single_sidebar(): Response
    {
        return $this->render('blog/blog-grid.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
}