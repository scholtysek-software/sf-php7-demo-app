<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;
use AppBundle\Repository\Car as CarRepository;
use AppBundle\Entity\Car as CarEntity;
use AppBundle\Repository\CarEntry as CarEntryRepository;
use AppBundle\Repository\CarAction as CarActionRepository;

class Car
{
    /**
     * @var CarRepository
     */
    private $carRepository;

    /**
     * @var CarEntryRepository
     */
    private $carEntryRepository;

    /**
     * @var CarActionRepository
     */
    private $carActionRepository;

    /**
     * Car constructor.
     * @param CarRepository $carRepository
     * @param CarEntryRepository $carEntryRepository
     * @param CarActionRepository $carActionRepository
     */
    public function __construct(
        CarRepository $carRepository,
        CarEntryRepository $carEntryRepository,
        CarActionRepository $carActionRepository
    ) {
        $this->carRepository = $carRepository;
        $this->carEntryRepository = $carEntryRepository;
        $this->carActionRepository = $carActionRepository;
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