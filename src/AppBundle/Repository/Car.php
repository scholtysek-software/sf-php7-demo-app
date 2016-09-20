<?php

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Car as CarEntity;

class Car extends EntityRepository
{
    /**
     * @param CarEntity $car
     */
    public function save(CarEntity $car)
    {
        $this->getEntityManager()->persist($car);
    }

    public function synchronize()
    {
        $this->getEntityManager()->flush();
    }
}