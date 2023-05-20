<?php

namespace App\Controller\Admin;

use App\Entity\News;
use App\Entity\Category;
use App\Entity\Comments;
use App\Entity\Images;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(NewsCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Aller sur le site', 'fas fa-undo', 'app_home');

        yield MenuItem::linkToDashboard('Index du pannel', 'fas fa-home');

        if ($this->isGranted('ROLE_NEWSEUR')) {
            yield MenuItem::subMenu('News', 'fas fa-newspaper')->setSubItems([
                MenuItem::linkToCrud('Ajouter une news', 'fas fa-plus', News::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Catégories', 'fas fa-newspaper', Category::class),
            ]);

            yield MenuItem::subMenu('Images', 'fas fa-photo-video')->setSubItems([
                MenuItem::linkToCrud('Toutes les images', 'fas fa-photo-video', Images::class),
                MenuItem::linkToCrud('Ajouter une image', 'fas fa-plus', Images::class)->setAction(Crud::PAGE_NEW),
            ]);
        }

        if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::linkToCrud('Commentaires', 'fas fa-comments', Comments::class);
            yield MenuItem::subMenu('Comptes', 'fas fa-user')->setSubItems([
                MenuItem::linkToCrud('Tous les comptes', 'fas fa-user-friends', User::class),
            ]);
        }
    }
}
