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
use AppBundle\Entity\Brand;

class VehicleController extends Controller
{
    /**
     * @Route("/vehicle/create")
     */
    public function createAction()
    {
        $vehicle = new Vehicle("AUDI A8 Super-Car", 15000.00);

        $entityManager = $this->get('doctrine.orm.default_entity_manager');

        $brand = $entityManager->getRepository(Brand::class)->findOneBy(['name' => 'AUDI']);
        if (!$brand) {
            $brand = new Brand();
            $brand->name = 'AUDI';
            $entityManager->persist($brand);
        }

        $vehicle->brand = $brand;

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

        $dql = "SELECT v, b, d
                 FROM \AppBundle\Entity\Vehicle v 
                 JOIN v.brand b
                 LEFT JOIN v.details d
                 WHERE v.id = ?1";
        $vehicle = $entityManager->createQuery($dql)
            ->setParameter(1, $id)
            ->getSingleResult();
        #$vehicle = $entityManager->find(Vehicle::class, $id);

        /*$repository = $entityManager->getRepository(Vehicle::class);
        $vehicle2 = $repository->findOneBy(['id' => $id]);
        var_dump($vehicle === $vehicle2);*/

        return ['vehicle' => $vehicle];
    }
}












