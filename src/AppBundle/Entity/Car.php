<?php

namespace AppBundle\Entity;

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
     * @param \AppBundle\Entity\User $user
     *
     * @return Car
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set lengthUnit
     *
     * @param \AppBundle\Entity\LengthUnit $lengthUnit
     *
     * @return Car
     */
    public function setLengthUnit(\AppBundle\Entity\LengthUnit $lengthUnit = null)
    {
        $this->lengthUnit = $lengthUnit;

        return $this;
    }

    /**
     * Get lengthUnit
     *
     * @return \AppBundle\Entity\LengthUnit
     */
    public function getLengthUnit()
    {
        return $this->lengthUnit;
    }
}
