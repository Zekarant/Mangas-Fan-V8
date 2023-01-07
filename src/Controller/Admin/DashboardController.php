<?php

namespace App\Controller\Admin;

use DateTime;
use App\Entity\News;
use App\Entity\Category;
use App\Entity\Comments;
use DiscordWebhook\Embed;
use DiscordWebhook\Webhook;
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
    )
    {}

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

        yield MenuItem::subMenu('News', 'fas fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('Ajouter une news', 'fas fa-newspaper', News::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Catégories', 'fas fa-newspaper', Category::class),
        ]);

        yield MenuItem::linkToCrud('Commentaires', 'fas fa-comments', Comments::class);
    }
}
