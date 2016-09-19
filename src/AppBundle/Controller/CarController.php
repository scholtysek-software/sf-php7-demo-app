<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Car;
use AppBundle\Entity\LengthUnit;
use AppBundle\Entity\User;
use AppBundle\Form\CarForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CarController
 * @package AppBundle\Controller
 * @Route("/car")
 */
class CarController extends Controller
{
    /**
     * @Route("/", name="cars-list")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        /** @var User $user */
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $cars = $this->get('app.service.car')->getUserCars($user);

        return $this->render('AppBundle:cars:cars-list.html.twig', [
            'cars' => $cars,
        ]);
    }

    /**
     * @Route("/add", name="car-add")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $car = new Car();
        $car->setUser($this->get('security.token_storage')->getToken()->getUser());
        $form = $this->createForm(CarForm::class, $car);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            var_dump('OK');
        }

        return $this->render('AppBundle:cars:car-add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}