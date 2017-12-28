<?php

namespace Miracode\StripeBundle\EventListener;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Manager\ManagerInterface;
use Miracode\StripeBundle\Stripe\StripeObjectType;
use Miracode\StripeBundle\StripeException;

class CouponEventSubscriber extends AbstractEventSubscriber
{
    /**
     * @var ManagerInterface
     */
    protected $couponManager;

    /**
     * CouponEventSubscriber constructor.
     *
     * @param ManagerInterface $couponManager
     */
    public function __construct(ManagerInterface $couponManager)
    {
        $this->couponManager = $couponManager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            StripeEvent::COUPON_CREATED => 'onCouponEvent',
            StripeEvent::COUPON_DELETED => 'onCouponDeleteEvent',
            StripeEvent::COUPON_UPDATED => 'onCouponEvent',
        ];
    }

    /**
     * Handle card events
     *
     * @param StripeEvent $event
     *
     * @throws StripeException
     */
    public function onCouponEvent(StripeEvent $event)
    {
        $this->checkObjectType($event, StripeObjectType::COUPON);
        $this->couponManager->save($event->getDataObject(), true);
    }

    /**
     * Handle delete coupon event
     *
     * @param StripeEvent $event
     *
     * @throws StripeException
     */
    public function onCouponDeleteEvent(StripeEvent $event)
    {
        $this->checkObjectType($event, StripeObjectType::COUPON);
        $this->couponManager->remove($event->getDataObject()['id'], true);
    }
}
