<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\CarAction;

class LoadCarAction implements FixtureInterface
{
    /**
     * @var array
     */
    private $actionNames = [
        'Oil change',
        'Filter change',
        'Another filter change'
    ];

    public function load(ObjectManager $manager)
    {
        foreach ($this->actionNames as $actionName) {
            $action = new CarAction();
            $action->setName($actionName);
            $manager->persist($action);
        }

        $manager->flush();
    }
}