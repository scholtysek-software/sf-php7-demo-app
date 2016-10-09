<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Car")
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 1,
     *      max = 32
     * )
     * @var string
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="cars")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="LengthUnit", inversedBy="cars")
     * @ORM\JoinColumn(name="length_unit_id", referencedColumnName="id")
     */
    private $lengthUnit;

    /**
     * @ORM\OneToMany(targetEntity="CarEntry", mappedBy="car")
     * @ORM\OrderBy({"date" = "DESC"})
     */
    private $carEntries;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return Car
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set lengthUnit
     *
     * @param LengthUnit $lengthUnit
     *
     * @return Car
     */
    public function setLengthUnit(LengthUnit $lengthUnit = null)
    {
        $this->lengthUnit = $lengthUnit;

        return $this;
    }

    /**
     * Get lengthUnit
     *
     * @return LengthUnit
     */
    public function getLengthUnit()
    {
        return $this->lengthUnit;
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
     * @return Car
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
