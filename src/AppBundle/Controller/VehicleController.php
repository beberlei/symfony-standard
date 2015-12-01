<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AppBundle\Entity\Vehicle;

class VehicleController extends Controller
{
    /**
     * @Route("/vehicle/create")
     */
    public function createAction()
    {
        $vehicle = new Vehicle();
        $vehicle->offerTitle = "AUDI A8 Super-Car";
        $vehicle->price = 15000.00;

        $entityManager = $this->get('doctrine.orm.default_entity_manager');

        $metadata = $entityManager->getClassMetadata(Vehicle::class);

        $entityManager->persist($vehicle);
        $entityManager->flush();

        return new Response('ID: ' . $vehicle->id);
    }

    /**
     * @Route("/vehicle/{id}")
     * @Template
     */
    public function showAction($id)
    {
        $entityManager = $this->get('doctrine.orm.default_entity_manager');
        $vehicle = $entityManager->find(Vehicle::class, $id);

        return ['vehicle' => $vehicle];
    }
}












