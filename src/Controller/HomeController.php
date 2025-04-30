<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Trajet;
use App\Entity\Client;
use App\Entity\AvecChauffeur;
use App\Entity\Reservation;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/offres', name: 'app_offres')]
    public function showOffres(EntityManagerInterface $em): Response
    {

        $offersRepo = $em->getRepository(Trajet::class);
        $offers = $offersRepo->findAll();

        return $this->render('home/offres.html.twig', [
            'offres' => $offers
        ]);
    }

    #[Route('/offres/reserver/{id}', name: 'app_offres_reserver')]
    public function createReservationForOffer(EntityManagerInterface $em,$id): Response
    {
        $offersRepo = $em->getRepository(Trajet::class);
        $offer = $offersRepo->find($id);
        
        $reservation = new Reservation();


        return $this->render('home/offres.html.twig', [
            
        ]);
    }

    #[Route('/rentacar', name: 'app_reserver_formules')]
    public function reserverFormule(EntityManagerInterface $em,$id): Response
    {
        $resa = new Reservation();
        

        return $this->render('location/formules.html.twig', [
            
        ]);
    }
}
