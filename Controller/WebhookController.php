<?php

namespace Aimir\StripeBundle\Controller;

use Aimir\StripeBundle\Event\StripeEventType;
use Aimir\StripeBundle\Stripe\StripeEvent;
use Aimir\StripeBundle\StripeException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WebhookController extends Controller
{
    public function handleAction(Request $request)
    {
        $event = json_decode($request->getContent());
        if (!isset($event->id) || !isset($event->object)) {
            throw new StripeException('Invalid webhook request data');
        }
        if ($event->object !== StripeEvent::STRIPE_OBJECT) {
            throw new StripeException('Unknown stripe object type in webhook');
        }
        $stripeEventApi = new StripeEvent();
        if (!$stripeEvent = $stripeEventApi->retrieve($event->id)) {
            throw new StripeException(sprintf('Event does not exists, id %s', $event->id));
        }

        $eventType = new StripeEventType($stripeEvent);
        $this->get('event_dispatcher')->dispatch('stripe.' . $stripeEvent->type, $eventType);

        return new Response();
    }
}
