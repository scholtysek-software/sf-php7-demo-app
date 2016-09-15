<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
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
}