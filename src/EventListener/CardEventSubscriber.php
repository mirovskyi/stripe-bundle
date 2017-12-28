<?php

namespace Miracode\StripeBundle\EventListener;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Manager\ManagerInterface;
use Miracode\StripeBundle\Stripe\StripeObjectType;
use Miracode\StripeBundle\StripeException;

class CardEventSubscriber extends AbstractEventSubscriber
{
    /**
     * @var ManagerInterface
     */
    protected $cardManager;

    /**
     * CardEventListener constructor.
     *
     * @param ManagerInterface $cardManager
     */
    public function __construct(ManagerInterface $cardManager)
    {
        $this->cardManager = $cardManager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            StripeEvent::CUSTOMER_SOURCE_CREATED => 'onCardEvent',
            StripeEvent::CUSTOMER_SOURCE_DELETED => 'onCardDeleteEvent',
            StripeEvent::CUSTOMER_SOURCE_UPDATED => 'onCardEvent',
            StripeEvent::SOURCE_CANCELED         => 'onCardEvent',
            StripeEvent::SOURCE_CHARGEABLE       => 'onCardEvent',
            StripeEvent::SOURCE_FAILED           => 'onCardEvent',
        ];
    }

    /**
     * Handle card events
     *
     * @param StripeEvent $event
     *
     * @throws StripeException
     */
    public function onCardEvent(StripeEvent $event)
    {
        $this->checkObjectType($event, StripeObjectType::CARD);
        $this->cardManager->save($event->getDataObject(), true);
    }

    /**
     * Handle card delete event
     *
     * @param StripeEvent $event
     *
     * @throws StripeException
     */
    public function onCardDeleteEvent(StripeEvent $event)
    {
        $this->checkObjectType($event, StripeObjectType::CARD);
        $this->cardManager->remove($event->getDataObject()['id'], true);
    }
}
