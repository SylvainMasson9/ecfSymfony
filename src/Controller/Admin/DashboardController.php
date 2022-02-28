<?php

namespace App\Controller\Admin;

use App\Entity\Bien;
use App\Entity\User;

use Symfony\UX\Chartjs\Model\Chart;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
     #[Route('/admin', name:'admin')]

    public function index(): Response
    {
        
       /* if ( $this->IsGranted("ROLE_ADMIN")|| $this->IsGranted("ROLE_AGENT")) {

            $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
            return $this->redirect($adminUrlGenerator->setController(BienCrudController::class)->generateUrl());

        } */
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(BienCrudController::class)->generateUrl());


        return parent::index();
       

        
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Agence Imobiliere');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

           
            MenuItem::linkToCrud('user', 'fa fa-list', User::class),
            MenuItem::linkToCrud('bien', 'fa fa-list', Bien::class)
            //->setPermission("ROLE_ADMIN")
            ->setAction("new"),

            
            MenuItem::linkToCrud('bien', 'fa fa-list', Bien::class)
            //->setPermission("ROLE_AGENT")
            ->setAction("new"),
            
        ];
    }
}
