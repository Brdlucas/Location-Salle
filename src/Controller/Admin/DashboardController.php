<?php

namespace App\Controller\Admin;


use App\Entity\Rooms;
use App\Entity\Ergonomics;
use App\Entity\Material;
use App\Entity\Reservations;
use App\Entity\Software;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/nesquik123', name: 'admin')]
    public function index(): Response
    {
        
        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        return $this->render('admin/admin.html.twig');
        
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Location Salle');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        return [
            
             MenuItem::SubMenu("test", 'fa fa-article')->setSubItems([
                yield MenuItem::linkToCrud('Salle', 'fa fa-room', Rooms::class),
                yield MenuItem::linkToCrud('Ergonomies', 'fa fa-boxes', Ergonomics::class),
                yield MenuItem::linkToCrud('Materiel', 'fa fa-database', Material::class),
                yield MenuItem::linkToCrud('Logiciels', 'fa fa-database', Software::class),
            ]),
        ];

    }
}