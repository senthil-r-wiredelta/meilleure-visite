<?php

namespace WireDelta\DemoBundle\Controller;

use WireDelta\DemoBundle\Entity\Event;
use WireDelta\DemoBundle\Form\EventType;

use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;

class EventsController extends Controller
{
    /**
     * @return array
     * @View()
     */
    public function getEventsAction()
    {
		$events = $this->getDoctrine()->getRepository('WireDeltaDemoBundle:Event')->findAll();
        return array('events' => $events);
		//$serializedEntity = $this->container->get('serializer')->serialize($events, 'json');
		//return new Response($serializedEntity);
    }
	
	
	/**
	 * @param Event $event
     * @return array
     * @View()
	 * @ParamConverter("event", class="WireDeltaDemoBundle:Event")
     */
	public function getEventAction(Event $event)
	{
		return array('event' => $event);
		//$serializedEntity = $this->container->get('serializer')->serialize($event, 'json');
		//return new Response($serializedEntity);
	}
	
	/**
     * @return array
     * @View()
	 * @return FormTypeInterface
     */
    public function newEventAction()
    {
		//return $this->createForm(new EventType());
		return $this->processForm(new Event());
		
	}

	/**
	 */
	private function processForm(Event $event)
    {
        $entityManager = $this->container->get('doctrine')->getEntityManager();
		$name = $this->getRequest()->get('name');
		$date = $this->getRequest()->get('date');
		$description = $this->getRequest()->get('description');
		if ($name != '' && $date != '' && $description != '') {		
			$event->setName($name);
			$event->setDate($date);
			$event->setDescription($description);
			
			$entityManager->persist($event);
			$entityManager->flush();
			$message = 'added';
		} else {
			$message = 'invalid';
		}
		$serializedEntity = $this->container->get('serializer')->serialize($message, 'json');
		return new Response($serializedEntity);
    }
}