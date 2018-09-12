<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Transit
 *
 * @ORM\Table(name="transits")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TransitRepository")
 */
class Transit
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="distance_kilometers", type="float")
     */
    private $distanceKilometers;

    /**
     * @var string
     *
     * @ORM\Column(name="locations", type="json_array")
     */
    private $locations;

    /**
     * @var int
     *
     * @ORM\Column(name="created_at", type="integer")
     */
    private $createdAt;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return float
     */
    public function getDistanceKilometers()
    {
        return $this->distanceKilometers;
    }

    /**
     * @param float $distanceKilometers
     */
    public function setDistanceKilometers($distanceKilometers)
    {
        $this->distanceKilometers = $distanceKilometers;
    }

    /**
     * @return string
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * @param string $locations
     */
    public function setLocations($locations)
    {
        $this->locations = $locations;
    }

    public function getCreatedAt()
    {
        return $this->createdAt->getTimestamp();
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

}

