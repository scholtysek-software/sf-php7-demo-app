<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarAction")
 * @ORM\Table(name="car_action")
 */
class CarAction
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="CarEntry", inversedBy="carActions")
     * @ORM\JoinTable(name="car_entries_car_actions")
     */
    private $carEntries;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->carEntries = new ArrayCollection();
    }

    /**
     * Add carEntry
     *
     * @param CarEntry $carEntry
     *
     * @return CarAction
     */
    public function addCarEntry(CarEntry $carEntry)
    {
        $this->carEntries[] = $carEntry;

        return $this;
    }

    /**
     * Remove carEntry
     *
     * @param CarEntry $carEntry
     */
    public function removeCarEntry(CarEntry $carEntry)
    {
        $this->carEntries->removeElement($carEntry);
    }

    /**
     * Get carEntries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCarEntries()
    {
        return $this->carEntries;
    }
}
