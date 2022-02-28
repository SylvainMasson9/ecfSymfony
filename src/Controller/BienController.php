<?php

namespace App\Controller;

use App\Entity\Bien;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BienController extends AbstractController
{
    #[Route('/bien', name: 'bien')]
    public function index(ManagerRegistry $manager): Response
    {
        return $this->render('bien/index.html.twig', [
            'bienList' => $manager->getRepository(Bien::class)->findAll(),
        ]);
    }
    #[Route('/acceuill', name: 'acceuil')]
    public function acceuil(ManagerRegistry $manager): Response
    {
        return $this->render('bien/acceuil.html.twig', [
            'pageAcceuil' => $manager->getRepository(Bien::class)->findBy( [],["id" => "DESC"], 5)
        ]);
    }

    #[
        Route('/bien/{id}', name:'bien_single', requirements:['id'=>'\d+'])
     ]
     public function single(int $id, ManagerRegistry $manager):Response
     {
         $bien = $manager->getRepository(Bien::class)->find($id);
 
         return $this->render("bien/single.html.twig", [
             'bien' => $bien
         ]);
     }
}
