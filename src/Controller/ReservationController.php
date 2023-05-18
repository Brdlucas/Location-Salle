<?php

namespace App\Controller;

use App\Entity\Reservations;
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
    public function new($id, Request $request, RoomsRepository $room, UserRepository $user, ManagerRegistry $doctrine): Response
    {

        $user = $this->getUser();        
        $reservation = new Reservations();
        $form = $this->createForm(ReservationType::class, $reservation, ['user' => $user]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $em = $doctrine->getManager();
            $em->persist($reservation);   
            $em->flush();

            return $this->redirectToRoute('app_home', array('id' => $reservation->getId()));
        }

        return $this->render('locations/reservation.html.twig', [
            'reservation' => $reservation,
            'Reservation' => $form->createView(),
            'room' => $room->findOneBy(
                ['id' => $id]
            ),
        ]);

    }
    
}