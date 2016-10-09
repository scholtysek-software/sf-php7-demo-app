<?php

namespace AppBundle\Repository;

use AppBundle\Entity\CarEntry as CarEntryEntity;

class CarEntry extends AbstractRepository
{
    /**
     * @param CarEntryEntity $carEntry
     */
    public function save(CarEntryEntity $carEntry)
    {
        $this->getEntityManager()->persist($carEntry);
    }
}
