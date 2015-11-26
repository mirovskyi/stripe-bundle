<?php

namespace Aimir\StripeBundle\EventListener;

use Aimir\StripeBundle\Event\StripeEventType;
use Aimir\StripeBundle\ModelManager\ModelManagerInterface;
use Aimir\StripeBundle\Stripe\StripeCharge;
use Aimir\StripeBundle\StripeException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ChargeEventListener implements EventSubscriberInterface
{
    /**
     * @var ModelManagerInterface
     */
    protected $chargeManager;

    /**
     * CardEventListener constructor.
     *
     * @param ModelManagerInterface $chargeManager
     */
    public function __construct(ModelManagerInterface $chargeManager)
    {
        $this->chargeManager = $chargeManager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            StripeEventType::CHARGE_CAPTURED => 'onChargeEvent',
            StripeEventType::CHARGE_FAILED => 'onChargeEvent',
            StripeEventType::CHARGE_REFUNDED => 'onChargeEvent',
            StripeEventType::CHARGE_SUCCEEDED => 'onChargeEvent',
            StripeEventType::CHARGE_UPDATED => 'onChargeEvent'
        ];
    }

    /**
     * Handle charge events
     *
     * @param StripeEventType $event
     *
     * @throws StripeException
     */
    public function onChargeEvent(StripeEventType $event)
    {
        $stripeCharge = $event->getEvent()['data']['object'];
        if ($stripeCharge['object'] != StripeCharge::STRIPE_OBJECT) {
            throw new StripeException(sprintf(
                'Invalid object type "%s". Expected type is "%s".',
                $stripeCharge['object'],
                StripeCharge::STRIPE_OBJECT
            ));
        }
        $this->chargeManager->save($stripeCharge, true);
    }
}
