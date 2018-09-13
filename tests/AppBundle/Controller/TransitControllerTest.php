<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Controller\TransitController;
use GuzzleHttp\RequestOptions;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use GuzzleHttp\Client;

class TransitControllerTest extends WebTestCase
{
    public function testGetAllAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/transits');

        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());

        $content = json_decode($response->getContent());
        $firstObject = $content->transits[0];

        $this->assertObjectHasAttribute('id', $firstObject);
        $this->assertObjectHasAttribute('distance_kilometers', $firstObject);
        $this->assertObjectHasAttribute('locations', $firstObject);
        $this->assertObjectHasAttribute('created_at', $firstObject);
    }

    public function testAddAction()
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/transits',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{
	            "locations": 
	                [
                        "Marszałkowska 1, Warszawa, PL",
                        "Argentinská 1, Praha, CZ",
                        "Marszałkowska 10, Warszawa, PL"
	                ]
             }'
        );

        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode());

        $content = json_decode($response->getContent());

        $this->assertObjectHasAttribute('id', $content);
        $this->assertObjectHasAttribute('distance_kilometers', $content);
        $this->assertObjectHasAttribute('locations', $content);
        $this->assertObjectHasAttribute('created_at', $content);
    }
}
