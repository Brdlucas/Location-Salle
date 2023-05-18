<?php

namespace App\Controller;

use App\Entity\Reservations;
use App\Form\ReservationType;
use App\Repository\RoomsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
class ReservationController extends AbstractController
{
    #[Route('/reservation/{id}', name: 'app_reservation')]
    public function new($id, Request $request, RoomsRepository $room, ManagerRegistry $doctrine): Response
    {
        $reservation = new Reservations();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
            )
        ]);
    }
    
}