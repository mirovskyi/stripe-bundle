<?php

namespace Miracode\StripeBundle\Event;

use Miracode\StripeBundle\StripeException;
use Stripe\StripeObject;
use Symfony\Contracts\EventDispatcher\Event;

class StripeEvent extends Event
{
    public const CHARGE_CAPTURED = 'stripe.charge.captured';
    public const CHARGE_FAILED = 'stripe.charge.failed';
    public const CHARGE_PENDING = 'charge.pending';
    public const CHARGE_REFUNDED = 'stripe.charge.refunded';
    public const CHARGE_SUCCEEDED = 'stripe.charge.succeeded';
    public const CHARGE_UPDATED = 'stripe.charge.updated';
    public const COUPON_CREATED = 'stripe.coupon.created';
    public const COUPON_DELETED = 'stripe.coupon.deleted';
    public const COUPON_UPDATED = 'stripe.coupon.updated';
    public const CUSTOMER_CREATED = 'stripe.customer.created';
    public const CUSTOMER_DELETED = 'stripe.customer.deleted';
    public const CUSTOMER_UPDATED = 'stripe.customer.updated';
    public const CUSTOMER_DISCOUNT_CREATED = 'stripe.customer.discount.created';
    public const CUSTOMER_DISCOUNT_DELETED = 'stripe.customer.discount.deleted';
    public const CUSTOMER_DISCOUNT_UPDATED = 'stripe.customer.discount.updated';
    public const CUSTOMER_SOURCE_CREATED = 'stripe.customer.source.created';
    public const CUSTOMER_SOURCE_DELETED = 'stripe.customer.source.deleted';
    public const CUSTOMER_SOURCE_UPDATED = 'stripe.customer.source.updated';
    public const CUSTOMER_SUBSCRIPTION_CREATED = 'stripe.customer.subscription.created';
    public const CUSTOMER_SUBSCRIPTION_DELETED = 'stripe.customer.subscription.deleted';
    public const CUSTOMER_SUBSCRIPTION_UPDATED = 'stripe.customer.subscription.updated';
    public const CUSTOMER_SUBSCRIPTION_TRIAL_WILL_END = 'stripe.customer.subscription.trial_will_end';
    public const CUSTOMER_TAX_ID_CREATED = 'stripe.customer.tax_id.created';
    public const CUSTOMER_TAX_ID_UPDATED = 'stripe.customer.tax_id.updated';
    public const INVOICE_CREATED = 'stripe.invoice.created';
    public const INVOICE_DELETED = 'stripe.invoice.deleted';
    public const INVOICE_FINALIZED = 'stripe.invoice.finalized';
    public const INVOICE_ITEM_UPDATED = 'stripe.invoiceitem.updated';
    public const INVOICE_PAYMENT_ACTION_REQUIRED = 'stripe.invoice.payment_action_required';
    public const INVOICE_PAYMENT_FAILED = 'stripe.invoice.payment_failed';
    public const INVOICE_PAYMENT_SUCCEEDED = 'stripe.invoice.payment_succeeded';
    public const INVOICE_SENT = 'stripe.invoice.sent';
    public const INVOICE_UPCOMING = 'stripe.invoice.upcoming';
    public const INVOICE_UPDATED = 'stripe.invoice.updated';
    public const INVOICE_VOIDED = 'stripe.invoice.voided';
    public const PRODUCT_CREATED = 'stripe.product.created';
    public const PRODUCT_DELETED = 'stripe.product.deleted';
    public const PRODUCT_UPDATED = 'stripe.product.updated';
    public const PRICE_CREATED = 'stripe.price.created';
    public const PRICE_DELETED = 'stripe.price.deleted';
    public const PRICE_UPDATED = 'stripe.price.updated';
    public const PLAN_CREATED = 'stripe.plan.created';
    public const PLAN_DELETED = 'stripe.plan.deleted';
    public const PLAN_UPDATED = 'stripe.plan.updated';
    public const PAYMENT_INTENT_AMOUNT_CAPTURABLE_UPDATED = 'stripe.payment_intent.amount_capturable_updated';
    public const PAYMENT_INTENT_CANCELLED = 'stripe.payment_intent.canceled';
    public const PAYMENT_INTENT_CREATED = 'stripe.payment_intent.created';
    public const PAYMENT_INTENT_PAYMENT_FILED = 'stripe.payment_intent.payment_failed';
    public const PAYMENT_INTENT_PROCESSING = 'stripe.payment_intent.processing';
    public const PAYMENT_INTENT_REQURIES_ACTION = 'stripe.payment_intent.requires_action';
    public const PAYMENT_INTENT_SUCCEEDED = 'stripe.payment_intent.succeeded';
    public const PAYMENT_METHOD_ATTACHED = 'stripe.payment_method.attached';
    public const PAYMENT_METHOD_DETACHED = 'stripe.payment_method.detached';
    public const PAYMENT_METHOD_UPDATED = 'stripe.payment_method.updated';
    public const PAYMENT_METHOD_AUTOMATICALLY_UPDATED = 'stripe.payment_method.automatically_updated';
    public const PAYOUT_PAID = 'stripe.payout.paid';
    public const REPORT_RUN_SUCCEEDED = 'stripe.reporting.report_run.succeeded';
    public const SETUP_INTENT_CANCELED = 'stripe.setup_intent.canceled';
    public const SETUP_INTENT_CREATED = 'stripe.setup_intent.created';
    public const SETUP_INTENT_REQUIRES_ACTION = 'stripe.setup_intent.requires_action';
    public const SETUP_INTENT_SETUP_FILED = 'stripe.setup_intent.setup_failed';
    public const SETUP_INTENT_SUCCEEDED = 'stripe.setup_intent.succeeded';
    public const SOURCE_CANCELED = 'stripe.source.canceled';
    public const SOURCE_CHARGEABLE = 'stripe.source.chargeable';
    public const SOURCE_FAILED = 'stripe.source.failed';
    public const TAX_RATE_CREATED = 'stripe.tax_rate.created';
    public const TAX_RATE_UPDATED = 'stripe.tax_rate.updated';
    public const CHECKOUT_SESSION_COMPLETED = 'stripe.checkout.session.completed';

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

    /**
     * Get event data object
     *
     * @return StripeObject
     * @throws StripeException
     */
    public function getDataObject()
    {
        $event = $this->getEvent();
        if (!isset($event['data']) || !isset($event['data']['object'])) {
            throw new StripeException('Invalid event data');
        }

        return $event['data']['object'];
    }
}
