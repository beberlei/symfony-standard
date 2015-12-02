<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Vehicle
{
    /** @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer") */
    public $id;

    /**
     * @ORM\Column(type="string")
     */
    private $offerTitle;

    /**
     * @ORM\Column(type="decimal")
     */
    private $price;

    public function __construct($offerTitle, $price)
    {
        $this->offerTitle = $offerTitle;
        $this->price = $price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }


    /**
     * @return mixed
     */
    public function getOfferTitle()
    {
        return $this->offerTitle;
    }
}
