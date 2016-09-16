<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\LengthUnit;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadLengthUnit implements FixtureInterface
{
    /**
     * @var array
     */
    private $unitNames = [
        'km',
        'm'
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->unitNames as $unitName) {
            $unit = new LengthUnit();
            $unit->setName($unitName);
            $manager->persist($unit);
        }

        $manager->flush();
    }
}