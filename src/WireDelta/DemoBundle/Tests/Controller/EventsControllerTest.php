<?php

namespace WireDelta\DemoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EventsControllerTest extends WebTestCase
{

	
	public function testNewEvent()
    {
		
		$client = static::createClient();
		
		$crawler = $client->request(
			'GET',
			'/events/new.json',
			array('name' => 'Test Case name', 'date' => '01-12-2016', 'description' => 'Test Case description 2'),
			array(),
			array('CONTENT_TYPE' => 'application/json')
		);
		$this->assertEquals(200, $client->getResponse()->getStatusCode());
		

		
    }
	
	public function testGetEvent()
	{

		$client = static::createClient();
		
		// head request
        $crawler = $client->request('GET', '/events.json');
        $response = $client->getResponse();
        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());
		
	}
}