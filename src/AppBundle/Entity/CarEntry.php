<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="car_entry")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarEntry")
 */
class CarEntry
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="CarAction", mappedBy="carEntries")
     */
    private $carActions;

    /**
     * @ORM\Column(type="date")
     * @var string
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min = 1
     * )
     * @var int
     */
    private $mileage;

    /**
     * @ORM\ManyToOne(targetEntity="Car", inversedBy="carEntries")
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id")
     */
    private $car;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * @param mixed $car
     */
    public function setCar($car)
    {
        $this->car = $car;
    }

    /**
     * @return mixed
     */
    public function getCarActions()
    {
        return $this->carActions;
    }

    /**
     * @param mixed $carActions
     */
    public function setCarActions($carActions)
    {
        $this->carActions = $carActions;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->carActions = new ArrayCollection();
    }

    /**
     * Add carAction
     *
     * @param CarAction $carAction
     *
     * @return CarEntry
     */
    public function addCarAction(CarAction $carAction)
    {
        $this->carActions[] = $carAction;

        return $this;
    }

    /**
     * Remove carAction
     *
     * @param CarAction $carAction
     */
    public function removeCarAction(CarAction $carAction)
    {
        $this->carActions->removeElement($carAction);
    }

    /**
     * @return int
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * @param int $mileage
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;
    }
}
