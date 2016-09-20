<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="car_history")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarHistory")
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
    private $carAction;

    /**
     * @ORM\Column(type="date")
     * @var string
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Car", inversedBy="carEntries")
     * @ORM\JoinColumn(name="car_entry_id", referencedColumnName="id")
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
    public function getCarAction()
    {
        return $this->carAction;
    }

    /**
     * @param mixed $carAction
     */
    public function setCarAction($carAction)
    {
        $this->carAction = $carAction;
    }
}