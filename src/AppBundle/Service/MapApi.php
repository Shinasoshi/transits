<?php

namespace AppBundle\Service;

use GuzzleHttp\Client;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class MapApi
{
    public function getDistance(array $locations)
    {
        $client = new Client(['base_uri' => 'https://open.mapquestapi.com/guidance/v2/route']);

        $distance = 0;
        $transitParts = count($locations) - 1;

        for ($x = 0; $x < $transitParts; $x++) {

            $data = $client->request('GET', '', [
                'query' => [
                    'key' => 'DEBv2A23FcS3DVKMlOwTty9BNsOyQTG3',
                    'from' => $locations[$x],
                    'to' => $locations[$x + 1],
                    'unit' => 'k'
                ]
            ]);

            $guidance = json_decode($data->getBody()->getContents())->guidance;

            $status = $guidance->info->statuscode;

            if ($status) {
                throw new BadRequestHttpException($guidance->info->messages[0], null, $status);
            }

            $partsDistance = $guidance->summary->length;
            $distance += $partsDistance;
        }

        return $distance;
    }
}