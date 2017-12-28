<?php

namespace Miracode\StripeBundle\EventListener;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\StripeException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

abstract class AbstractEventSubscriber implements EventSubscriberInterface
{
    /**
     * Check object type in event data
     *
     * @param StripeEvent $event
     * @param string $expectedObjectType
     *
     * @throws \Miracode\StripeBundle\StripeException
     */
    public function checkObjectType(StripeEvent $event, $expectedObjectType)
    {
        $data = $event->getDataObject();
        if ($data['object'] != $expectedObjectType) {
            throw new StripeException(sprintf(
                'Invalid object type "%s". Expected type is "%s".',
                $data['object'],
                $expectedObjectType
            ));
        }
    }
}
