<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Request\ParamFetcher;
use Symfony\Component\HttpFoundation\JsonResponse;

class TransitController extends FOSRestController
{
    /**
     * @View
     * @Route("/transits")
     * @Method({"POST"})
     * @RequestParam(name="locations")
     */
    public function addAction(ParamFetcher $fetcher)
    {
        $jms = $this->get('jms_serializer');
        $transitManager = $this->get('app.transit_manager');
        $mapApi = $this->get('app.map_api');

        $locations = $fetcher->get("locations");

        $locationsAreValid = $transitManager->validateLocations($locations);

        if (!$locationsAreValid){
            return new JsonResponse('Invalid request format', 400);
        }

        try {
            $distance = $mapApi->getDistance($locations);
            $transit = $transitManager->addTransit($distance, $locations);
        } catch (\Exception $e) {
            return new JsonResponse($e->getMessage(), $e->getCode());
        }

        $preparedTransit = $jms->serialize($transit, 'json');

        return new JsonResponse(json_decode($preparedTransit), 200);
    }

    /**
     * @View
     * @Route("/transits")
     * @Method("GET")
     */
    public function getAllAction()
    {
        $transitManager = $this->get('app.transit_manager');
        $jms = $this->get('jms_serializer');

        try {
            $data = $transitManager->getCachedTransits();
        } catch (\Exception $e) {
            return new JsonResponse($e->getMessage(), $e->getCode());
        }

        $transits = $jms->serialize($data, 'json');

        return new JsonResponse([
            'transits'=> json_decode($transits)
        ], 200);
    }
}
