<?php

namespace Miracode\StripeBundle\Stripe;

use Stripe\Card;
use Stripe\Charge;
use Stripe\Coupon;
use Stripe\Customer;
use Stripe\Plan;
use Stripe\Product;
use Stripe\Refund;
use Stripe\Stripe;
use Stripe\StripeClientInterface;
use Stripe\Subscription;
use Stripe\SubscriptionItem;

/**
 * An extension of the Stripe PHP SDK, including an API key parameter to automatically authenticate.
 *
 * This class will provide helper methods to use the Stripe SDK
 *
 * Sourced from the flo-sch/stripe-bundle
 */
class StripeClient extends \Stripe\StripeClient implements StripeClientInterface
{
    public function __construct($config = [])
    {
        if ('test' === $config['environment']) {
            $config['api_key'] = $config['secret_key_test'];
        } else {
            $config['api_key'] = $config['secret_key'];
        }

        unset($config['environment']);
        unset($config['secret_key']);
        unset($config['perishable_key']);
        unset($config['secret_key_test']);
        unset($config['perishable_key_test']);

        parent::__construct($config);
    }

    /**
     * Associate a new Customer object to an existing Plan.
     *
     * @see https://stripe.com/docs/subscriptions/tutorial#create-subscription
     *
     * @param string      $planId:        The plan ID as defined in your Stripe dashboard
     * @param string      $paymentToken:  The payment token returned by the payment form (Stripe.js)
     * @param string      $customerEmail: The customer email
     * @param string|null $couponId:      An optional coupon ID
     *
     * @return Customer
     *
     * @throws HttpException:
     *     - If the planId is invalid (the plan does not exists...)
     *     - If the payment token is invalid (payment failed)
     */
    public function subscribeCustomerToPlan($planId, $paymentToken, $customerEmail, $couponId = null)
    {
        $customer = $this->customers->create([
            'source' => $paymentToken,
            'email' => $customerEmail,
        ]);

        $data = [
            'customer' => $customer->id,
            'plan' => $planId,
        ];

        if ($couponId) {
            $data['coupon'] = $couponId;
        }

        $subscription = $this->subscriptions->create($data);

        return $customer;
    }

    /**
     * Associate an existing Customer object to an existing Plan.
     *
     * @see https://stripe.com/docs/api#create_subscription
     *
     * @param string $customerId: The customer ID as defined in your Stripe dashboard
     * @param string $planId:     The plan ID as defined in your Stripe dashboard
     * @param array  $parameters: Optional additional parameters, the complete list is available here: https://stripe.com/docs/api#create_subscription
     *
     * @return Subscription
     *
     * @throws HttpException:
     *      - If the customerId is invalid (the customer does not exists...)
     *      - If the planId is invalid (the plan does not exists...)
     */
    public function subscribeExistingCustomerToPlan($customerId, $planId, $parameters = [])
    {
        $data = [
            'customer' => $customerId,
            'plan' => $planId,
        ];

        if (is_array($parameters) && !empty($parameters)) {
            $data = array_merge($parameters, $data);
        }

        return $this->subscriptions->create($data);
    }

    /**
     * Associate an existing Customer object to an existing Plan.
     *
     * @see https://stripe.com/docs/api#create_subscription
     *
     * @param string $customerId: The customer ID as defined in your Stripe dashboard
     * @param array  $items:      An Array of Plan items
     * @param array  $parameters: Optional additional parameters, the complete list is available here: https://stripe.com/docs/api#create_subscription
     *
     * @return Subscription
     *
     * @throws HttpException:
     *      - If the customerId is invalid (the customer does not exists...)
     *      - If the planId is invalid (the plan does not exists...)
     */
    public function subscribeExistingCustomerToMultiplePlans($customerId, $items = [], $parameters = [])
    {
        $data = [
            'customer' => $customerId,
            'items' => $items,
        ];

        if (is_array($parameters) && !empty($parameters)) {
            $data = array_merge($parameters, $data);
        }

        return $this->subscriptions->create($data);
    }

    /**
     * @param array $parameters
     *
     * @return SubscriptionItem
     */
    public function createSubscriptionItem($subscriptionId, $planId, $quantity, $parameters = [])
    {
        $data = [
            'subscription' => $subscriptionId,
            'plan' => $planId,
            'quantity' => $quantity,
        ];

        if (is_array($parameters) && !empty($parameters)) {
            $data = array_merge($parameters, $data);
        }

        return $this->subscriptionItems->create($data);
    }

    /**
     * Create a new Charge from a payment token, to an optional connected stripe account, with an optional application fee.
     *
     * @see https://stripe.com/docs/charges
     *
     * @param int    $chargeAmount:    The charge amount in cents
     * @param string $chargeCurrency:  The charge currency to use
     * @param string $paymentToken:    The payment token returned by the payment form (Stripe.js)
     * @param string $stripeAccountId: The connected stripe account ID
     * @param int    $applicationFee:  The fee taken by the platform, in cents
     * @param string $description:     An optional charge description
     * @param array  $metadata:        An optional array of metadatas
     *
     * @return Charge
     *
     * @throws HttpException:
     *     - If the payment token is invalid (payment failed)
     */
    public function createCharge($chargeAmount, $chargeCurrency, $paymentToken, $stripeAccountId = null, $applicationFee = 0, $chargeDescription = '', $chargeMetadata = [])
    {
        $chargeOptions = [
            'amount' => $chargeAmount,
            'currency' => $chargeCurrency,
            'source' => $paymentToken,
            'description' => $chargeDescription,
            'metadata' => $chargeMetadata,
        ];

        if ($applicationFee && intval($applicationFee) > 0) {
            $chargeOptions['application_fee'] = intval($applicationFee);
        }

        $connectedAccountOptions = [];

        if ($stripeAccountId) {
            $connectedAccountOptions['stripe_account'] = $stripeAccountId;
        }

        return $this->charges->create($chargeOptions, $connectedAccountOptions);
    }

    /**
     * Create a new Destination Charge from a payment token, to a connected stripe account, with an application fee.
     *
     * @see https://stripe.com/docs/connect/destination-charges
     *
     * @param int    $chargeAmount:      The charge amount in cents
     * @param string $chargeCurrency:    The charge currency to use
     * @param string $paymentToken:      The payment token returned by the payment form (Stripe.js)
     * @param string $stripeAccountId:   The connected stripe account ID
     * @param int    $applicationFee:    The fee taken by the platform, in cents
     * @param string $chargeDescription: An optional charge description
     * @param array  $chargeMetadata:    An optional array of metadatas
     *
     * @return Charge
     *
     * @throws HttpException:
     *     - If the payment token is invalid (payment failed)
     */
    public function createDestinationCharge($chargeAmount, $chargeCurrency, $paymentToken, $stripeAccountId, $applicationFee, $chargeDescription = '', $chargeMetadata = [])
    {
        $chargeOptions = [
            'amount' => $chargeAmount,
            'currency' => $chargeCurrency,
            'source' => $paymentToken,
            'description' => $chargeDescription,
            'metadata' => $chargeMetadata,
            'destination' => [
                'amount' => $chargeAmount - $applicationFee,
                'account' => $stripeAccountId,
            ],
        ];

        return $this->charges->create($chargeOptions);
    }

    /**
     * Create a new Charge from a payment token, to an optional connected stripe account, with an optional application fee.
     *
     * @see https://stripe.com/docs/charges#saving-credit-card-details-for-later
     *
     * @param string $paymentToken: The payment token returned by the payment form (Stripe.js)
     * @param string $email:        An optional customer e-mail
     * @param array  $parameters:   Optional additional parameters, the complete list is available here: https://stripe.com/docs/api#create_customer
     *
     * @return Charge
     *
     * @throws HttpException:
     *     - If the payment token is invalid (payment failed)
     */
    public function createCustomer($paymentToken, $email = null, $parameters = [])
    {
        $data = [
            'source' => $paymentToken,
            'email' => $email,
        ];

        if (is_array($parameters) && !empty($parameters)) {
            $data = array_merge($parameters, $data);
        }

        return $this->customers->create($data);
    }

    /**
     * Create a new Charge on an existing Customer object, to an optional connected stripe account, with an optional application fee.
     *
     * @see https://stripe.com/docs/charges#saving-credit-card-details-for-later
     *
     * @param int    $chargeAmount:    The charge amount in cents
     * @param string $chargeCurrency:  The charge currency to use
     * @param string $customerId:      The Stripe Customer object ID
     * @param string $stripeAccountId: The connected stripe account ID
     * @param int    $applicationFee:  The fee taken by the platform, in cents
     * @param string $description:     An optional charge description
     * @param array  $metadata:        An optional array of metadatas
     *
     * @return Charge
     *
     * @throws HttpException:
     *     - If the payment token is invalid (payment failed)
     */
    public function chargeCustomer($chargeAmount, $chargeCurrency, $customerId, $stripeAccountId = null, $applicationFee = 0, $chargeDescription = '', $chargeMetadata = [])
    {
        $chargeOptions = [
            'amount' => $chargeAmount,
            'currency' => $chargeCurrency,
            'customer' => $customerId,
            'description' => $chargeDescription,
            'metadata' => $chargeMetadata,
        ];

        if ($applicationFee && intval($applicationFee) > 0) {
            $chargeOptions['application_fee'] = intval($applicationFee);
        }

        $connectedAccountOptions = [];

        if ($stripeAccountId) {
            $connectedAccountOptions['stripe_account'] = $stripeAccountId;
        }

        return $this->charges->create($chargeOptions, $connectedAccountOptions);
    }

    /**
     * Create a new Refund on an existing Charge (by its ID).
     *
     * @see https://stripe.com/docs/connect/direct-charges#issuing-refunds
     *
     * @param string $chargeId:             The charge ID
     * @param int    $refundAmount:         The charge amount in cents
     * @param array  $metadata:             optional additional informations about the refund
     * @param string $reason:               The reason of the refund, either "requested_by_customer", "duplicate" or "fraudulent"
     * @param bool   $refundApplicationFee: Wether the application_fee should be refunded aswell
     * @param bool   $reverseTransfer:      Wether the transfer should be reversed
     * @param string $stripeAccountId:      The optional connected stripe account ID on which charge has been made
     *
     * @return Refund
     *
     * @throws HttpException:
     *     - If the charge id is invalid (the charge does not exists...)
     *     - If the charge has already been refunded
     */
    public function refundCharge($chargeId, $refundAmount = null, $metadata = [], $reason = 'requested_by_customer', $refundApplicationFee = true, $reverseTransfer = false, $stripeAccountId = null)
    {
        $refundOptions = [
            'charge' => $chargeId,
            'metadata' => $metadata,
            'reason' => $reason,
            'refund_application_fee' => (bool) $refundApplicationFee,
            'reverse_transfer' => (bool) $reverseTransfer,
        ];

        if ($refundAmount) {
            $refundOptions['amount'] = intval($refundAmount);
        }

        $connectedAccountOptions = [];

        if ($stripeAccountId) {
            $connectedAccountOptions['stripe_account'] = $stripeAccountId;
        }

        return $this->refunds->create($refundOptions, $connectedAccountOptions);
    }

    /**
     * @param string $name       Product Name
     * @param string $type       'service' or 'goods'
     * @param array  $parameters Array of additional parameters to pass to the constructor
     *
     * @return Product
     */
    public function createProduct($name, $type, $parameters = [])
    {
        $data = [
            'name' => $name,
            'type' => $type,
        ];

        if (is_array($parameters) && !empty($parameters)) {
            $data = array_merge($parameters, $data);
        }

        return $this->products::create($data);
    }

    /**
     * @param string $productId
     * @param string $interval
     * @param null   $currency   Currency to billin , defaults to 'eur'
     * @param array  $parameters
     *
     * @return Plan
     */
    public function createPlan($productId, $interval, $currency = null, $parameters = [])
    {
        if (null === $currency) {
            $currency = 'eur';
        }

        $data = [
            'product' => $productId,
            'interval' => $interval,
            'currency' => $currency,
        ];

        if (is_array($parameters) && !empty($parameters)) {
            $data = array_merge($parameters, $data);
        }

        return $this->plans->create($data);
    }

    /**
     * @param string    $id
     * @param string    $duration
     * @param bool      $isPercentage True = percentage_type deduction, false = amount_type
     * @param int|float $discount     The percentage discount, or amount discount
     * @param array     $parameters   Additional parameters to pass to the constructor
     *
     * @return Coupon
     */
    public function createCoupon($id, $duration, $isPercentage, $discount, $parameters = [])
    {
        $data = [
            'id' => $id,
            'duration' => $duration,
        ];

        if ($isPercentage) {
            $data['percent_off'] = $discount;
        } else {
            $data['amount_off'] = $discount;
        }

        if (is_array($parameters) && !empty($parameters)) {
            $data = array_merge($parameters, $data);
        }

        return $this->coupons->create($data);
    }
}
