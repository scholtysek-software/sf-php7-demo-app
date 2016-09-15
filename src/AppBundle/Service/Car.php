<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

class Car
{

    /**
     * @var EntityRepository
     */
    private $carRepository;

    /**
     * @param EntityRepository $carRepository
     */
    public function setCarRepository(EntityRepository $carRepository)
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
}