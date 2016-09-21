<?php

namespace AppBundle\Repository;

use AppBundle\Entity\CarAction as CarActionEntity;

class CarAction extends AbstractRepository
{
    /**
     * @param CarActionEntity $carAction
     */
    public function save(CarActionEntity $carAction)
    {
        $this->getEntityManager()->persist($carAction);
    }
}