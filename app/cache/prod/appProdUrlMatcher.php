<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        // wiredelta_demo_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'wiredelta_demo_default_index')), array (  '_controller' => 'WireDelta\\DemoBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/events')) {
            // get_events
            if (preg_match('#^/events(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_get_events;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'get_events')), array (  '_controller' => 'WireDelta\\DemoBundle\\Controller\\EventsController::getEventsAction',  '_format' => NULL,));
            }
            not_get_events:

            // get_event
            if (preg_match('#^/events/(?P<event>[^/\\.]++)(?:\\.(?P<_format>json|xml|html))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_get_event;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'get_event')), array (  '_controller' => 'WireDelta\\DemoBundle\\Controller\\EventsController::getEventAction',  '_format' => NULL,));
            }
            not_get_event:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
