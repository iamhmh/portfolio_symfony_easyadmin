<?php

namespace App\Controller\Admin;

use App\Entity\Projects;
use App\Entity\Articles;
use App\Entity\Services;
use App\Entity\Team;
use App\Entity\Contact;
use App\Entity\BlogImage;
use App\Entity\ClientLogo;
use App\Entity\ProjectImage;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/login.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio Symfony')
            ->setFaviconPath('favicon.ico');
            

    }
    
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Projects', 'fas fa-list', Projects::class);
        yield MenuItem::linkToCrud('Articles', 'fas fa-list', Articles::class);
        yield MenuItem::linkToCrud('Services', 'fas fa-list', Services::class);
        yield MenuItem::linkToCrud('Team', 'fas fa-list', Team::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-list', Contact::class);
        yield MenuItem::linkToCrud('BlogImage', 'fas fa-list', BlogImage::class);
        yield MenuItem::linkToCrud('ClientLogo', 'fas fa-list', ClientLogo::class);
        yield MenuItem::linkToCrud('ProjectImage', 'fas fa-list', ProjectImage::class);
    }
}
