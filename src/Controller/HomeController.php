<?php

namespace App\Controller;

use App\Repository\ComputerRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $date = new DateTime();
        return $this->render('home.html.twig', [
            'date' => $date->format('d/m/Y')
        ]);
    }


}
