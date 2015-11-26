<?php

namespace Aimir\StripeBundle\EventListener;

use Aimir\StripeBundle\Event\StripeEventType;
use Aimir\StripeBundle\ModelManager\ModelManagerInterface;
use Aimir\StripeBundle\Stripe\StripeSubscription;
use Aimir\StripeBundle\StripeException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SubscriptionEventListener implements EventSubscriberInterface
{
    /**
     * @var ModelManagerInterface
     */
    protected $subscriptionManager;

    /**
     * SubscriptionEventListener constructor.
     *
     * @param ModelManagerInterface $subscriptionManager
     */
    public function __construct(ModelManagerInterface $subscriptionManager)
    {
        $this->subscriptionManager = $subscriptionManager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            StripeEventType::CUSTOMER_SUBSCRIPTION_CREATED => 'onSubscriptionEvent',
            StripeEventType::CUSTOMER_SUBSCRIPTION_UPDATED => 'onSubscriptionEvent',
            StripeEventType::CUSTOMER_SUBSCRIPTION_DELETED => 'onPSubscriptionDeleteEvent',
        ];
    }

    /**
     * Handle subscription events
     *
     * @param StripeEventType $event
     *
     * @throws StripeException
     */
    public function onSubscriptionEvent(StripeEventType $event)
    {
        $stripeSubscription = $event->getEvent()['data']['object'];
        if ($stripeSubscription['object'] != StripeSubscription::STRIPE_OBJECT) {
            throw new StripeException(sprintf(
                'Invalid object type "%s". Expected type is "%s".',
                $stripeSubscription['object'],
                StripeSubscription::STRIPE_OBJECT
            ));
        }
        $this->subscriptionManager->save($stripeSubscription, true);
    }

    /**
     * Handle subscription delete event
     *
     * @param StripeEventType $event
     *
     * @throws StripeException
     */
    public function onSubscriptionDeleteEvent(StripeEventType $event)
    {
        $stripeSubscription = $event->getEvent()['data']['object'];
        if ($stripeSubscription['object'] != StripeSubscription::STRIPE_OBJECT) {
            throw new StripeException(sprintf(
                'Invalid object type "%s". Expected type is "%s".',
                $stripeSubscription['object'],
                StripeSubscription::STRIPE_OBJECT
            ));
        }
        $this->subscriptionManager->remove($stripeSubscription['id'], true);
    }
}
