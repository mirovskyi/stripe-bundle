<?php

namespace Aimir\StripeBundle\EventListener;

use Aimir\StripeBundle\Event\StripeEventType;
use Aimir\StripeBundle\ModelManager\ModelManagerInterface;
use Aimir\StripeBundle\Stripe\StripeCard;
use Aimir\StripeBundle\StripeException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CardEventListener implements EventSubscriberInterface
{
    /**
     * @var ModelManagerInterface
     */
    protected $cardManager;

    /**
     * CardEventListener constructor.
     *
     * @param ModelManagerInterface $cardManager
     */
    public function __construct(ModelManagerInterface $cardManager)
    {
        $this->cardManager = $cardManager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            StripeEventType::CUSTOMER_SOURCE_CREATED => 'onCardEvent',
            StripeEventType::CUSTOMER_SOURCE_DELETED => 'onCardEvent',
            StripeEventType::CUSTOMER_SOURCE_UPDATED => 'onCardEvent',
        ];
    }

    /**
     * Handle card events
     *
     * @param StripeEventType $event
     *
     * @throws StripeException
     */
    public function onCardEvent(StripeEventType $event)
    {
        $stripeCard = $event->getEvent()['data']['object'];
        if ($stripeCard['object'] != StripeCard::STRIPE_OBJECT) {
            throw new StripeException(sprintf(
                'Invalid object type "%s". Expected type is "%s".',
                $stripeCard['object'],
                StripeCard::STRIPE_OBJECT
            ));
        }
        $this->cardManager->save($stripeCard, true);
    }

    /**
     * Handle card delete event
     *
     * @param StripeEventType $event
     *
     * @throws StripeException
     */
    public function onCardDeleteEvent(StripeEventType $event)
    {
        $stripeCard = $event->getEvent()['data']['object'];
        if ($stripeCard['object'] != StripeCard::STRIPE_OBJECT) {
            throw new StripeException(sprintf(
                'Invalid object type "%s". Expected type is "%s".',
                $stripeCard['object'],
                StripeCard::STRIPE_OBJECT
            ));
        }
        $this->cardManager->remove($stripeCard, true);
    }
}
