<?php

namespace App\Controller;

use App\Entity\Atribution;
use App\Entity\Customer;
use App\Repository\AtributionRepository;
use App\Repository\ComputerRepository;
use App\Repository\CustomerRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AttributionController extends AbstractController
{
    /**
     * @Route("/attribution", name="attribution")
     */
    public function index(AtributionRepository $atributionRepository)
    {

        return $this->render('attribution/show.html.twig', [
            'controller_name' => 'AttributionController',
        ]);
    }

    /**
     * @Route("/attribution/create", name="attribution_create", methods={"POST"})
     */
    public function addAttribution(Request $request, ComputerRepository $computerRepository)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $lastName = $request->request->get('lastname');
        $computer = $request->request->get('computer');
        $hour = $request->request->get('hour');

        $computer = $computerRepository->find($computer);

        $customer = (new Customer())
            ->setFirstName(' ')
            ->setLastName($lastName);

        $attribution = (new Atribution())
            ->setComputer($computer)
            ->setCustomer($customer)
            ->setHour($hour)
            ->setDate(new DateTime());

        $entityManager->persist($attribution);
        $entityManager->flush();

        $this->addFlash('success', $computer->getName() . ' à bien été attribué à ' . $customer->getLastName());
        return $this->redirectToRoute('home');

    }

    /**
     * @Route("/attribution/{id}/show", name="attribution")
     */
    public function show(Atribution $atribution)
    {
        return $this->render('attribution/show.html.twig', [
            'attribution' => $atribution,
        ]);
    }


    /**
     * @Route("/attribution/{id}/delete", name="attribution_delete", methods={"DELETE"})
     */
    public function deleteCustomerAtribution(Atribution $atribution)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($atribution);
        $entityManager->flush();
        return $this->redirectToRoute('home');
    }

}
