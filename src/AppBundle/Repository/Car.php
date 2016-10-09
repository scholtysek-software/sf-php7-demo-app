<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Car as CarEntity;

class Car extends AbstractRepository
{
    /**
     * @param CarEntity $car
     */
    public function save(CarEntity $car)
    {
        $this->getEntityManager()->persist($car);
    }
}