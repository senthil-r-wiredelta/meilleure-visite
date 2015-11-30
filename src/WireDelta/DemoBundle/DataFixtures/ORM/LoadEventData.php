<?php
namespace WireDelta\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use WireDelta\DemoBundle\Entity\Event;

class LoadEventData implements FixtureInterface
{
	/**
	 * Load data fistures with the passed EntityManager
	 *
	 */
	public function load(ObjectManager $manager)
	{
		$event = new Event();
		$event->setName('New Year');
		$event->setDate('2015-12-31');
		$event->setDescription('Welcome the New year 2016. Have a blast.');
		
		$manager->persist($event);
		
		$manager->flush();
	}
}

