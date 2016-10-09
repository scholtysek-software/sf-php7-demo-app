<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class AbstractRepository
 * @package AppBundle\Repository
 */
class AbstractRepository extends EntityRepository
{
    public function synchronize()
    {
        $this->getEntityManager()->flush();
    }
}