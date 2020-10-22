<?php

namespace App\Controller;

use App\Entity\Computer;
use App\Form\ComputerType;
use App\Repository\AtributionRepository;
use App\Repository\ComputerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComputerController extends AbstractController
{
    /**
     * @Route("/computer", name="computer_index", methods={"GET"})
     * @param ComputerRepository $repo
     * @return Response
     */
    public function indexComputer(ComputerRepository $repo, AtributionRepository $atributionRepository)
    {
        $computer = $repo->findAll();
        $attribution = $atributionRepository->findAll();

        return $this->render('computer/index.html.twig', [
            'computers' => $computer,
            'attributions' => $attribution
        ]);
    }

    /**
     * @Route("/computer/new", name="computer_create", methods={"POST"})
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function createComputer(Request $request) : Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $name = $request->request->get('name');
        $computer = (new Computer())
            ->setName($name);

        $entityManager->persist($computer);
        $entityManager->flush();

        $this->addFlash('success', $computer->getName() . ' à bien été ajouté.');
        return $this->redirectToRoute('home');

    }

    /**
     * @Route("/computer/{id}/delete", name="computer_delete", methods={"DELETE"})
     */
    public function deleteComputer(Computer $computer)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($computer);
        $entityManager->flush();
        return $this->redirectToRoute('home');
    }



}
