<?php

namespace App\Controller;

use App\Entity\Reservations;
use App\Form\ReservationType;
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
            'rooms' => $rooms->findBy(
                [],
                ['id' => 'ASC'],
            ),
        ]);
    }

    #[Route('/locations/loc/{id}', name: 'one_location', methods: ['GET', 'POST'])]

    public function oneLocation($id, RoomsRepository $rooms) : Response
    {
        return $this->render('locations/location.html.twig', [
            'room' => $rooms->find($id),
        ]);
    }
   
}