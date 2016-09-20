<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;
use AppBundle\Repository\Car as CarRepository;
use AppBundle\Entity\Car as CarEntity;

class Car
{
    /**
     * @var CarRepository
     */
    private $carRepository;

    /**
     * @param CarRepository $carRepository
     */
    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    /**
     * @param User $user
     * @return array
     */
    public function getUserCars(User $user) : array
    {
        return $this->carRepository->findBy([
                'user' => $user->getId()
            ]);
    }

    /**
     * @param CarEntity $car
     */
    public function addCar(CarEntity $car)
    {
        $this->carRepository->save($car);
        $this->carRepository->synchronize();
    }
}