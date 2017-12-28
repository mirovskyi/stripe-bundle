<?php

namespace Miracode\StripeBundle\EventListener;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Manager\ManagerInterface;
use Miracode\StripeBundle\Stripe\StripeObjectType;
use Miracode\StripeBundle\StripeException;

class SubscriptionEventSubscriber extends AbstractEventSubscriber
{
    /**
     * @var ManagerInterface
     */
    protected $subscriptionManager;

    /**
     * SubscriptionEventListener constructor.
     *
     * @param ManagerInterface $subscriptionManager
     */
    public function __construct(ManagerInterface $subscriptionManager)
    {
        $this->subscriptionManager = $subscriptionManager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            StripeEvent::CUSTOMER_SUBSCRIPTION_CREATED =>
                'onSubscriptionEvent',
            StripeEvent::CUSTOMER_SUBSCRIPTION_UPDATED =>
                'onSubscriptionEvent',
            StripeEvent::CUSTOMER_SUBSCRIPTION_TRAIL_WILL_END =>
                'onSubscriptionEvent',
            StripeEvent::CUSTOMER_SUBSCRIPTION_DELETED =>
                'onPSubscriptionDeleteEvent',
        ];
    }

    /**
     * Handle subscription events
     *
     * @param StripeEvent $event
     *
     * @throws StripeException
     */
    public function onSubscriptionEvent(StripeEvent $event)
    {
        $this->checkObjectType($event, StripeObjectType::SUBSCRIPTION);
        $this->subscriptionManager->save($event->getDataObject(), true);
    }

    /**
     * Handle subscription delete event
     *
     * @param StripeEvent $event
     *
     * @throws StripeException
     */
    public function onSubscriptionDeleteEvent(StripeEvent $event)
    {
        $this->checkObjectType($event, StripeObjectType::SUBSCRIPTION);
        $this->subscriptionManager->remove($event->getDataObject()['id'], true);
    }
}
