<?php

namespace App\Controller;

use App\Repository\RoomsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(RoomsRepository $rooms): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'rooms' => $rooms->findBy(
                [],
                ['id' => 'DESC'],
                3),
        ]);
    }
}