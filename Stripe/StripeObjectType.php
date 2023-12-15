<?php

namespace Miracode\StripeBundle\Stripe;

class StripeObjectType
{
    public const CARD = 'card';
    public const CHARGE = 'charge';
    public const COUPON = 'coupon';
    public const CUSTOMER = 'customer';
    public const DISCOUNT = 'discount';
    public const EVENT = 'event';
    public const INVOICE = 'invoice';
    public const PLAN = 'plan';
    public const REFUND = 'refund';
    public const SUBSCRIPTION = 'subscription';
    public const COLLECTION = 'list';
}
