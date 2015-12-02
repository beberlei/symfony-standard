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
        $vehicle = new Vehicle("AUDI A4", 12000);

        $entityManager = $this->get('doctrine.orm.default_entity_manager');
        $entityManager->persist($vehicle);

        $entityManager->flush();

        return new Response('ID: ' . $vehicle->id . '</body>');
    }

    /**
     * @Route("/vehicle/{id}")
     * @Template
     */
    public function showAction($id)
    {
        $entityManager = $this->get('doctrine.orm.default_entity_manager');

        $vehicle = $entityManager->find(Vehicle::class, $id);

        $vehicle2 = $entityManager->getRepository(Vehicle::class)->findOneBy(['id' => $id]);

        var_dump($vehicle === $vehicle2);

        return ['vehicle' => $vehicle];
    }
}



















