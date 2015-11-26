<?php

namespace Aimir\StripeBundle\EventListener;

use Aimir\StripeBundle\Event\StripeEventType;
use Aimir\StripeBundle\Model\CustomerModelInterface;
use Aimir\StripeBundle\ModelManager\ModelManagerInterface;
use Aimir\StripeBundle\Stripe\StripeCoupon;
use Aimir\StripeBundle\Stripe\StripeDiscount;
use Aimir\StripeBundle\StripeException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CouponEventListener implements EventSubscriberInterface
{
    /**
     * @var ModelManagerInterface
     */
    protected $couponManager;

    /**
     * @var ModelManagerInterface
     */
    protected $customerManager;

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * CardEventListener constructor.
     *
     * @param ModelManagerInterface $couponManager
     * @param ModelManagerInterface $customerManager
     * @param ObjectManager $objectManager
     */
    public function __construct(ModelManagerInterface $couponManager, ModelManagerInterface $customerManager, ObjectManager $objectManager)
    {
        $this->couponManager = $couponManager;
        $this->customerManager = $customerManager;
        $this->objectManager = $objectManager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            StripeEventType::COUPON_CREATED => 'onCouponEvent',
            StripeEventType::COUPON_DELETED => 'onCouponDeleteEvent',
            StripeEventType::COUPON_UPDATED => 'onCouponEvent',
            StripeEventType::CUSTOMER_DISCOUNT_CREATED => 'onCustomerDiscountEvent',
            StripeEventType::CUSTOMER_DISCOUNT_DELETED => 'onCustomerDiscountDeleteEvent',
            StripeEventType::CUSTOMER_DISCOUNT_UPDATED => 'onCustomerDiscountEvent',
        ];
    }

    /**
     * Handle card events
     *
     * @param StripeEventType $event
     *
     * @throws StripeException
     */
    public function onCouponEvent(StripeEventType $event)
    {
        $stripeCoupon = $event->getEvent()['data']['object'];
        $this->validateEventObject($stripeCoupon, StripeCoupon::STRIPE_OBJECT);
        $this->couponManager->save($stripeCoupon, true);
    }

    /**
     * Handle delete coupon event
     *
     * @param StripeEventType $event
     *
     * @throws StripeException
     */
    public function onCouponDeleteEvent(StripeEventType $event)
    {
        $stripeCoupon = $event->getEvent()['data']['object'];
        $this->validateEventObject($stripeCoupon, StripeCoupon::STRIPE_OBJECT);
        $this->couponManager->remove($stripeCoupon['id'], true);
    }

    /**
     * Handle customer discount events (create/update)
     *
     * @param StripeEventType $event
     *
     * @throws StripeException
     */
    public function onCustomerDiscountEvent(StripeEventType $event)
    {
        $stripeDiscount = $event->getEvent()['data']['object'];
        $this->validateEventObject($stripeDiscount, StripeDiscount::STRIPE_OBJECT);
        $coupon = $this->couponManager->save($stripeDiscount['coupon'], true);
        /** @var CustomerModelInterface $customer */
        if ($customer = $this->customerManager->retrieve($stripeDiscount['customer'])) {
            if ($customer->getCoupon() != $coupon->getStripeId()) {
                $customer->setCoupon($coupon->getStripeId());
                $this->objectManager->flush($customer);
            }
        }
    }

    /**
     * Handle customer discount remove action
     *
     * @param StripeEventType $event
     *
     * @throws StripeException
     */
    public function onCustomerDiscountDeleteEvent(StripeEventType $event)
    {
        $stripeDiscount = $event->getEvent()['data']['object'];
        $this->validateEventObject($stripeDiscount, StripeDiscount::STRIPE_OBJECT);
        /** @var CustomerModelInterface $customer */
        if ($customer = $this->customerManager->retrieve($stripeDiscount['customer'])) {
            if ($customer->getCoupon() == $$stripeDiscount['coupon']['id']) {
                $customer->setCoupon(null);
                $this->objectManager->flush($customer);
            }
        }
    }

    /**
     * Validate stripe object type in event
     *
     * @param $stripeObject
     * @param  $type
     * @throws StripeException
     */
    protected function validateEventObject($stripeObject, $type)
    {
        if ($stripeObject['object'] != $type) {
            throw new StripeException(sprintf(
                'Invalid object type "%s". Expected type is "%s".',
                $stripeObject['object'],
                $type
            ));
        }
    }
}
