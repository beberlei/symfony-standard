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
    public $offerTitle;

    /**
     * @ORM\Column(type="decimal")
     */
    public $price;
}
