<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Entity\Recettes;
use App\Entity\Categories;
use App\Entity\Ingredients;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use \EasyCorp\Bundle\EasyAdminBundle\Config\Menu\SectionMenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
      
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet Symfony Dwwm')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', Users::class);
        yield MenuItem::linkToCrud('Ingrédients', 'fas fa-list', Ingredients::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Categories::class);
        yield MenuItem::linkToCrud('Recettes', 'fas fa-bell-concierge', Recettes::class);
    }
}
