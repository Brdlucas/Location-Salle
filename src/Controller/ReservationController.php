<?php

namespace App\Controller;

use App\Entity\Reservations;
use App\Entity\Rooms;
use App\Form\ReservationType;
use App\Repository\RoomsRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
class ReservationController extends AbstractController
{
    #[Route('/reservation/{id}', name: 'app_reservation')]
    public function new($id, Request $request, RoomsRepository $room, UserRepository $users, ManagerRegistry $doctrine): Response
    {
        // $repo = $this->$doctrine->getRepository(Rooms::class);
        // $rooms = $repo->find($id);

        $reservation = new Reservations();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            // $reservation->setRoom($rooms);
            $em = $doctrine->getManager();
            $em->persist($reservation);   
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('locations/reservation.html.twig', [
            'reservation' => $reservation,
            'Reservation' => $form->createView(),
            'room' => $room->findOneBy(
                ['id' => $id]
            ),
            'user' => $users->findOneBy(
                ['id' => $id]
            )
        ]);

    }
    
}