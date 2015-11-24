<?php

namespace Aimir\StripeBundle\Event;

use Stripe\StripeObject;

class StripeEventType
{
    const CHARGE_CAPTURED = 'charge.captured';
    const CHARGE_FAILED = 'charge.failed';
    const CHARGE_REFUNDED = 'charge.refunded';
    const CHARGE_SUCCEEDED = 'charge.succeeded';
    const CHARGE_UPDATED = 'charge.updated';
    const COUPON_CREATED = 'coupon.created';
    const COUPON_DELETED = 'coupon.deleted';
    const COUPON_UPDATED = 'coupon.updated';
    const CUSTOMER_CREATED = 'customer.created';
    const CUSTOMER_DELETED = 'customer.deleted';
    const CUSTOMER_UPDATED = 'customer.updated';
    const CUSTOMER_DISCOUNT_CREATED = 'customer.discount.created';
    const CUSTOMER_DISCOUNT_DELETED = 'customer.discount.deleted';
    const CUSTOMER_DISCOUNT_UPDATED = 'customer.discount.updated';
    const CUSTOMER_SOURCE_CREATED = 'customer.source.created';
    const CUSTOMER_SOURCE_DELETED = 'customer.source.deleted';
    const CUSTOMER_SOURCE_UPDATED = 'customer.source.updated';
    const CUSTOMER_SUBSCRIPTION_CREATED = 'customer.subscription.created';
    const CUSTOMER_SUBSCRIPTION_DELETED = 'customer.subscription.deleted';
    const CUSTOMER_SUBSCRIPTION_UPDATED = 'customer.subscription.updated';
    const CUSTOMER_SUBSCRIPTION_TRAIL_WILL_END = 'customer.subscription.trial_will_end';
    const INVOICE_CREATED = 'invoice.created';
    const INVOICE_PAYMENT_FAILED = 'invoice.payment_failed';
    const INVOICE_PAYMENT_SUCCEEDED = 'invoice.payment_succeeded';
    const INVOICE_UPDATED = 'invoice.updated';
    const PLAN_CREATED = 'plan.created';
    const PLAN_DELETED = 'plan.deleted';
    const PLAN_UPDATED = 'plan.updated';

    /**
     * @var StripeObject
     */
    protected $event;

    /**
     * StripeEventType constructor.
     *
     * @param StripeObject $event
     */
    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Get stripe event object
     *
     * @return StripeObject
     */
    public function getEvent()
    {
        return $this->event;
    }
}
