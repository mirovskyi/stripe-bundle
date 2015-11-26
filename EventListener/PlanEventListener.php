<?php

namespace Aimir\StripeBundle\EventListener;

use Aimir\StripeBundle\Event\StripeEventType;
use Aimir\StripeBundle\ModelManager\ModelManagerInterface;
use Aimir\StripeBundle\Stripe\StripePlan;
use Aimir\StripeBundle\StripeException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PlanEventListener implements EventSubscriberInterface
{
    /**
     * @var ModelManagerInterface
     */
    protected $planManager;

    /**
     * PlanEventListener constructor.
     *
     * @param ModelManagerInterface $planManager
     */
    public function __construct(ModelManagerInterface $planManager)
    {
        $this->planManager = $planManager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            StripeEventType::PLAN_CREATED => 'onPlanEvent',
            StripeEventType::PLAN_UPDATED => 'onInvoiceEvent',
            StripeEventType::PLAN_DELETED => 'onInvoiceEvent',
        ];
    }

    /**
     * Handle plan events
     *
     * @param StripeEventType $event
     *
     * @throws StripeException
     */
    public function onPlanEvent(StripeEventType $event)
    {
        $stripePlan = $event->getEvent()['data']['object'];
        if ($stripePlan['object'] != StripePlan::STRIPE_OBJECT) {
            throw new StripeException(sprintf(
                'Invalid object type "%s". Expected type is "%s".',
                $stripePlan['object'],
                StripePlan::STRIPE_OBJECT
            ));
        }
        $this->planManager->save($stripePlan, true);
    }

    /**
     * Handle plan delete event
     *
     * @param StripeEventType $event
     *
     * @throws StripeException
     */
    public function onPlanDeleteEvent(StripeEventType $event)
    {
        $stripePlan = $event->getEvent()['data']['object'];
        if ($stripePlan['object'] != StripePlan::STRIPE_OBJECT) {
            throw new StripeException(sprintf(
                'Invalid object type "%s". Expected type is "%s".',
                $stripePlan['object'],
                StripePlan::STRIPE_OBJECT
            ));
        }
        $this->planManager->remove($stripePlan['id'], true);
    }
}
