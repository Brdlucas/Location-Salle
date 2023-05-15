<?php

namespace App\Controller;

use App\Repository\RoomsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocationsController extends AbstractController
{
    #[Route('/locations', name: 'app_locations')]
    public function index(RoomsRepository $rooms): Response
    {
        return $this->render('locations/locations.html.twig', [
            'controller_name' => 'LocationsController',
            'rooms' => $rooms->findAll(),
        ]);
    }

    #[Route('/locations/{id}', name: 'one_location', methods: ['GET', 'POST'])]

    public function oneLocation($id, RoomsRepository $rooms) : Response
    {
        return $this->render('location/location.html.twig', [
            'room' => $rooms->findOneBy(
                ['id' => $id],
            )
        ]);
    }
    
    public function __toString() {

        return $this->Ergonomic;
    }
}