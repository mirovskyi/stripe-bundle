<?php

namespace Miracode\StripeBundle\Stripe;

class StripeObjectType
{
    /**
     * Stripe object types
     */
    const CARD         = 'card';
    const CHARGE       = 'charge';
    const COUPON       = 'coupon';
    const CUSTOMER     = 'customer';
    const DISCOUNT     = 'discount';
    const EVENT        = 'event';
    const INVOICE      = 'invoice';
    const PLAN         = 'plan';
    const REFUND       = 'refund';
    const SUBSCRIPTION = 'subscription';
    const COLLECTION   = 'list';
}
