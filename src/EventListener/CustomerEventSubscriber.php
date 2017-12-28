<?php

namespace Miracode\StripeBundle\EventListener;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Manager\ManagerInterface;
use Miracode\StripeBundle\Stripe\StripeObjectType;

class CustomerEventSubscriber extends AbstractEventSubscriber
{
    /**
     * @var ManagerInterface
     */
    protected $customerManager;

    /**
     * CouponEventSubscriber constructor.
     *
     * @param ManagerInterface $customerManager
     */
    public function __construct(ManagerInterface $customerManager)
    {
        $this->customerManager = $customerManager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            StripeEvent::CUSTOMER_CREATED => 'onCustomerEvent',
            StripeEvent::CUSTOMER_UPDATED => 'onCustomerEvent',
            StripeEvent::CUSTOMER_DELETED => 'onCustomerDeleteEvent',
        ];
    }

    /**
     * @param StripeEvent $event
     */
    public function onCustomerEvent(StripeEvent $event)
    {
        $this->checkObjectType($event, StripeObjectType::CUSTOMER);
        $this->customerManager->save($event->getDataObject(), true);
    }

    /**
     * @param StripeEvent $event
     */
    public function onCustomerDeleteEvent(StripeEvent $event)
    {
        $this->checkObjectType($event, StripeObjectType::CUSTOMER);
        $this->customerManager->remove($event->getDataObject(), true);
    }
}
