<?php

namespace Miracode\StripeBundle\EventListener;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Manager\ManagerInterface;
use Miracode\StripeBundle\Stripe\StripeObjectType;

class DiscountEventSubscriber extends AbstractEventSubscriber
{
    /**
     * @var ManagerInterface
     */
    protected $discountManager;

    /**
     * DiscountEventSubscriber constructor.
     * @param ManagerInterface $manager
     */
    public function __construct(ManagerInterface $manager)
    {
        $this->discountManager = $manager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            StripeEvent::CUSTOMER_DISCOUNT_CREATED => 'onDiscountEvent',
            StripeEvent::CUSTOMER_DISCOUNT_DELETED => 'onDiscountDeleteEvent',
            StripeEvent::CUSTOMER_DISCOUNT_UPDATED => 'onDiscountEvent',
        ];
    }

    /**
     * @param StripeEvent $event
     */
    public function onDiscountEvent(StripeEvent $event)
    {
        $this->checkObjectType($event, StripeObjectType::DISCOUNT);
        $this->discountManager->save($event->getDataObject(), true);
    }

    /**
     * @param StripeEvent $event
     */
    public function onDiscountDeleteEvent(StripeEvent $event)
    {
        $this->checkObjectType($event, StripeObjectType::DISCOUNT);
        $this->discountManager->remove($event->getDataObject()['id']);
    }
}
