<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Vehicle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="string")
     */
    private $offerTitle;

    /**
     * @ORM\Column(type="decimal")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="Brand", fetch="EAGER")
     */
    public $brand;

    /**
     * @ORM\OneToOne(targetEntity="Details", mappedBy="vehicle")
     */
    public $details;

    public function __construct($offerTitle, $price)
    {
        $this->offerTitle = $offerTitle;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getOfferTitle()
    {
        return $this->offerTitle;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }
}
