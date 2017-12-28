<?php

namespace Miracode\StripeBundle\EventListener;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Manager\ManagerInterface;
use Miracode\StripeBundle\Stripe\StripeObjectType;
use Miracode\StripeBundle\StripeException;

class ChargeEventSubscriber extends AbstractEventSubscriber
{
    /**
     * @var ManagerInterface
     */
    protected $chargeManager;

    /**
     * CardEventListener constructor.
     *
     * @param ManagerInterface $chargeManager
     */
    public function __construct(ManagerInterface $chargeManager)
    {
        $this->chargeManager = $chargeManager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            StripeEvent::CHARGE_CAPTURED  => 'onChargeEvent',
            StripeEvent::CHARGE_FAILED    => 'onChargeEvent',
            StripeEvent::CHARGE_PENDING   => 'onChargeEvent',
            StripeEvent::CHARGE_REFUNDED  => 'onChargeEvent',
            StripeEvent::CHARGE_SUCCEEDED => 'onChargeEvent',
            StripeEvent::CHARGE_UPDATED   => 'onChargeEvent'
        ];
    }

    /**
     * Handle charge events
     *
     * @param StripeEvent $event
     *
     * @throws StripeException
     */
    public function onChargeEvent(StripeEvent $event)
    {
        $this->checkObjectType($event, StripeObjectType::CHARGE);
        $this->chargeManager->save($event->getDataObject(), true);
    }
}
