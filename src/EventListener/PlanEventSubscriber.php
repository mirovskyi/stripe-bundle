<?php

namespace Miracode\StripeBundle\EventListener;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Manager\ManagerInterface;
use Miracode\StripeBundle\Stripe\StripeObjectType;
use Miracode\StripeBundle\Stripe\StripePlan;
use Miracode\StripeBundle\StripeException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PlanEventSubscriber extends AbstractEventSubscriber
{
    /**
     * @var ManagerInterface
     */
    protected $planManager;

    /**
     * PlanEventListener constructor.
     *
     * @param ManagerInterface $planManager
     */
    public function __construct(ManagerInterface $planManager)
    {
        $this->planManager = $planManager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            StripeEvent::PLAN_CREATED => 'onPlanEvent',
            StripeEvent::PLAN_UPDATED => 'onPlanEvent',
            StripeEvent::PLAN_DELETED => 'onPlanDeleteEvent',
        ];
    }

    /**
     * Handle plan events
     *
     * @param StripeEvent $event
     *
     * @throws StripeException
     */
    public function onPlanEvent(StripeEvent $event)
    {
        $this->checkObjectType($event, StripeObjectType::PLAN);
        $this->planManager->save($event->getDataObject(), true);
    }

    /**
     * Handle plan delete event
     *
     * @param StripeEvent $event
     *
     * @throws StripeException
     */
    public function onPlanDeleteEvent(StripeEvent $event)
    {
        $this->checkObjectType($event, StripeObjectType::PLAN);
        $this->planManager->remove($event->getDataObject()['id'], true);
    }
}
