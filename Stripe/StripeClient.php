<?php
/**
 * Created by PhpStorm.
 * User: mark ogilvie
 *
 * Date: 19/11/18
 * Time: 18:55
 */

namespace Miracode\StripeBundle\Stripe;

use Stripe\Stripe,
    Stripe\Charge,
    Stripe\Customer,
    Stripe\Coupon,
    Stripe\Plan,
    Stripe\Product,
    Stripe\Subscription,
    Stripe\SubscriptionItem,
    Stripe\Refund;

/**
 *
 * An extension of the Stripe PHP SDK, including an API key parameter to automatically authenticate.
 *
 * This class will provide helper methods to use the Stripe SDK
 *
 * Sourced from the flo-sch/stripe-bundle
 */
class StripeClient extends Stripe
{
    public function __construct($stripeApiKey)
    {
        self::setApiKey($stripeApiKey);

        return $this;
    }

    /**
     * Retrieve a Coupon instance by its ID
     *
     * @throws HttpException:
     *     - If the couponId is invalid (the coupon does not exists...)
     *
     * @see https://stripe.com/docs/api#coupons
     *
     * @param string $couponId: The coupon ID
     *
     * @return Coupon
     */
    public function retrieveCoupon($couponId)
    {
        return Coupon::retrieve($couponId);
    }

    /**
     * Retrieve a Plan instance by its ID
     *
     * @throws HttpException:
     *     - If the planId is invalid (the plan does not exists...)
     *
     * @see https://stripe.com/docs/subscriptions/tutorial#create-subscription
     *
     * @param string $planId: The plan ID
     *
     * @return Plan
     */
    public function retrievePlan($planId)
    {
        return Plan::retrieve($planId);
    }

    /**
     * Retrieve a Customer instance by its ID
     *
     * @throws HttpException:
     *     - If the customerId is invalid
     *
     * @see https://stripe.com/docs/api#customers
     *
     * @param string $customerId: The customer ID
     *
     * @return Customer
     */
    public function retrieveCustomer($customerId)
    {
        return Customer::retrieve($customerId);
    }

    /**
     * Retrieve a Subscription instance by its ID
     *
     * @throws HttpException:
     *     - If the customerId is invalid
     *
     * @see https://stripe.com/docs/api#customers
     *
     * @param string $customerId: The customer ID
     *
     * @return Subscription
     */
    public function retrieveSubscription($subscriptionId)
    {
        return Subscription::retrieve($subscriptionId);
    }

    /**
     * Retrieve a SubscriptionItem instance by its ID
     *
     * @throws HttpException:
     *     - If the customerId is invalid
     *
     * @param $subscriptionItemId
     * @return SubscriptionItem
     */
    public function retrieveSubscriptionItem($subscriptionItemId)
    {
        return SubscriptionItem::retrieve($subscriptionItemId);
    }

    /**
     * Retrieve a Charge instance by its ID
     *
     * @throws HttpException:
     *     - If the chargeId is invalid
     *
     * @see https://stripe.com/docs/api#charges
     *
     * @param string $chargeId: The charge ID
     *
     * @return Charge
     */
    public function retrieveCharge($chargeId)
    {
        return Charge::retrieve($chargeId);
    }

    /**
     * Associate a new Customer object to an existing Plan.
     *
     * @throws HttpException:
     *     - If the planId is invalid (the plan does not exists...)
     *     - If the payment token is invalid (payment failed)
     *
     * @see https://stripe.com/docs/subscriptions/tutorial#create-subscription
     *
     * @param string $planId: The plan ID as defined in your Stripe dashboard
     * @param string $paymentToken: The payment token returned by the payment form (Stripe.js)
     * @param string $customerEmail: The customer email
     * @param string|null $couponId: An optional coupon ID
     *
     * @return Customer
     */
    public function subscribeCustomerToPlan($planId, $paymentToken, $customerEmail, $couponId = null)
    {
        $customer = Customer::create([
            'source'    => $paymentToken,
            'email'     => $customerEmail
        ]);

        $data = [
            'customer'  => $customer->id,
            'plan'      => $planId,
        ];

        if ($couponId) {
            $data['coupon'] = $couponId;
        }

        $subscription = Subscription::create($data);

        return $customer;
    }

    /**
     * Associate an existing Customer object to an existing Plan.
     *
     * @throws HttpException:
     *      - If the customerId is invalid (the customer does not exists...)
     *      - If the planId is invalid (the plan does not exists...)
     *
     * @see https://stripe.com/docs/api#create_subscription
     *
     * @param string $customerId: The customer ID as defined in your Stripe dashboard
     * @param string $planId: The plan ID as defined in your Stripe dashboard
     * @param array $parameters: Optional additional parameters, the complete list is available here: https://stripe.com/docs/api#create_subscription
     *
     * @return Subscription
     */
    public function subscribeExistingCustomerToPlan($customerId, $planId, $parameters = [])
    {
        $data = [
            'customer'      => $customerId,
            'plan'          => $planId
        ];

        if (is_array($parameters) && !empty($parameters)) {
            $data = array_merge($parameters, $data);
        }

        return Subscription::create($data);
    }

    /**
     * Associate an existing Customer object to an existing Plan.
     *
     * @throws HttpException:
     *      - If the customerId is invalid (the customer does not exists...)
     *      - If the planId is invalid (the plan does not exists...)
     *
     * @see https://stripe.com/docs/api#create_subscription
     *
     * @param string $customerId: The customer ID as defined in your Stripe dashboard
     * @param array $items: An Array of Plan items.
     * @param array $parameters: Optional additional parameters, the complete list is available here: https://stripe.com/docs/api#create_subscription
     *
     * @return Subscription
     */
    public function subscribeExistingCustomerToMultiplePlans($customerId, $items = [], $parameters = [])
    {
        $data = [
            'customer'      => $customerId,
            'items'          => $items
        ];

        if (is_array($parameters) && !empty($parameters)) {
            $data = array_merge($parameters, $data);
        }

        return Subscription::create($data);
    }

    /**
     * @param       $subscriptionId
     * @param       $planId
     * @param       $quantity
     * @param array $parameters
     * @return SubscriptionItem
     */
    public function createSubscriptionItem($subscriptionId, $planId, $quantity, $parameters = [])
    {
        $data = [
            "subscription" => $subscriptionId,
            "plan" => $planId,
            "quantity" => $quantity,
        ];

        if (is_array($parameters) && !empty($parameters)) {
            $data = array_merge($parameters, $data);
        }

        return Subscription::create($data);
    }

    /**
     * Create a new Charge from a payment token, to an optional connected stripe account, with an optional application fee.
     *
     * @throws HttpException:
     *     - If the payment token is invalid (payment failed)
     *
     * @see https://stripe.com/docs/charges
     *
     * @param int    $chargeAmount: The charge amount in cents
     * @param string $chargeCurrency: The charge currency to use
     * @param string $paymentToken: The payment token returned by the payment form (Stripe.js)
     * @param string $stripeAccountId: The connected stripe account ID
     * @param int    $applicationFee: The fee taken by the platform, in cents
     * @param string $description: An optional charge description
     * @param array  $metadata: An optional array of metadatas
     *
     * @return Charge
     */
    public function createCharge($chargeAmount, $chargeCurrency, $paymentToken, $stripeAccountId = null, $applicationFee = 0, $chargeDescription = '', $chargeMetadata = [])
    {
        $chargeOptions = [
            'amount'            => $chargeAmount,
            'currency'          => $chargeCurrency,
            'source'            => $paymentToken,
            'description'       => $chargeDescription,
            'metadata'          => $chargeMetadata
        ];

        if ($applicationFee && intval($applicationFee) > 0) {
            $chargeOptions['application_fee'] = intval($applicationFee);
        }

        $connectedAccountOptions = [];

        if ($stripeAccountId) {
            $connectedAccountOptions['stripe_account'] = $stripeAccountId;
        }

        return Charge::create($chargeOptions, $connectedAccountOptions);
    }

    /**
     * Create a new Destination Charge from a payment token, to a connected stripe account, with an application fee.
     *
     * @throws HttpException:
     *     - If the payment token is invalid (payment failed)
     *
     * @see https://stripe.com/docs/connect/destination-charges
     *
     * @param int    $chargeAmount: The charge amount in cents
     * @param string $chargeCurrency: The charge currency to use
     * @param string $paymentToken: The payment token returned by the payment form (Stripe.js)
     * @param string $stripeAccountId: The connected stripe account ID
     * @param int    $applicationFee: The fee taken by the platform, in cents
     * @param string $chargeDescription: An optional charge description
     * @param array  $chargeMetadata: An optional array of metadatas
     *
     * @return Charge
     */
    public function createDestinationCharge($chargeAmount, $chargeCurrency, $paymentToken, $stripeAccountId, $applicationFee, $chargeDescription = '', $chargeMetadata = [])
    {
        $chargeOptions = [
            'amount'            => $chargeAmount,
            'currency'          => $chargeCurrency,
            'source'            => $paymentToken,
            'description'       => $chargeDescription,
            'metadata'          => $chargeMetadata,
            'destination'       => [
                'amount' => $chargeAmount - $applicationFee,
                'account' => $stripeAccountId
            ]
        ];

        return Charge::create($chargeOptions);
    }

    /**
     * Create a new Charge from a payment token, to an optional connected stripe account, with an optional application fee.
     *
     * @throws HttpException:
     *     - If the payment token is invalid (payment failed)
     *
     * @see https://stripe.com/docs/charges#saving-credit-card-details-for-later
     *
     * @param string $paymentToken: The payment token returned by the payment form (Stripe.js)
     * @param string $email: An optional customer e-mail
     * @param array $parameters: Optional additional parameters, the complete list is available here: https://stripe.com/docs/api#create_customer
     *
     * @return Charge
     */
    public function createCustomer($paymentToken, $email = null, $parameters = [])
    {
        $data = [
            'source' => $paymentToken,
            'email' => $email
        ];

        if (is_array($parameters) && !empty($parameters)) {
            $data = array_merge($parameters, $data);
        }

        return Customer::create($data);
    }

    /**
     * Create a new Charge on an existing Customer object, to an optional connected stripe account, with an optional application fee
     *
     * @throws HttpException:
     *     - If the payment token is invalid (payment failed)
     *
     * @see https://stripe.com/docs/charges#saving-credit-card-details-for-later
     *
     * @param int    $chargeAmount: The charge amount in cents
     * @param string $chargeCurrency: The charge currency to use
     * @param string $customerId: The Stripe Customer object ID
     * @param string $stripeAccountId: The connected stripe account ID
     * @param int    $applicationFee: The fee taken by the platform, in cents
     * @param string $description: An optional charge description
     * @param array  $metadata: An optional array of metadatas
     *
     * @return Charge
     */
    public function chargeCustomer($chargeAmount, $chargeCurrency, $customerId, $stripeAccountId = null, $applicationFee = 0, $chargeDescription = '', $chargeMetadata = [])
    {
        $chargeOptions = [
            'amount'            => $chargeAmount,
            'currency'          => $chargeCurrency,
            'customer'          => $customerId,
            'description'       => $chargeDescription,
            'metadata'          => $chargeMetadata
        ];

        if ($applicationFee && intval($applicationFee) > 0) {
            $chargeOptions['application_fee'] = intval($applicationFee);
        }

        $connectedAccountOptions = [];

        if ($stripeAccountId) {
            $connectedAccountOptions['stripe_account'] = $stripeAccountId;
        }

        return Charge::create($chargeOptions, $connectedAccountOptions);
    }

    /**
     * Create a new Refund on an existing Charge (by its ID).
     *
     * @throws HttpException:
     *     - If the charge id is invalid (the charge does not exists...)
     *     - If the charge has already been refunded
     *
     * @see https://stripe.com/docs/connect/direct-charges#issuing-refunds
     *
     * @param string $chargeId: The charge ID
     * @param int    $refundAmount: The charge amount in cents
     * @param array  $metadata: optional additional informations about the refund
     * @param string $reason: The reason of the refund, either "requested_by_customer", "duplicate" or "fraudulent"
     * @param bool   $refundApplicationFee: Wether the application_fee should be refunded aswell.
     * @param bool   $reverseTransfer: Wether the transfer should be reversed
     * @param string $stripeAccountId: The optional connected stripe account ID on which charge has been made.
     *
     * @return Refund
     */
    public function refundCharge($chargeId, $refundAmount = null, $metadata = [], $reason = 'requested_by_customer', $refundApplicationFee = true, $reverseTransfer = false, $stripeAccountId = null)
    {
        $refundOptions = [
            'charge'                    => $chargeId,
            'metadata'                  => $metadata,
            'reason'                    => $reason,
            'refund_application_fee'    => (bool) $refundApplicationFee,
            'reverse_transfer'          => (bool) $reverseTransfer
        ];

        if ($refundAmount) {
            $refundOptions['amount'] = intval($refundAmount);
        }

        $connectedAccountOptions = [];

        if ($stripeAccountId) {
            $connectedAccountOptions['stripe_account'] = $stripeAccountId;
        }

        return Refund::create($refundOptions, $connectedAccountOptions);
    }

    /**
     * @param string $name Product Name
     * @param string $type 'service' or 'goods'
     * @param array $parameters Array of additional parameters to pass to the constructor
     * @return Product
     */
    public function createProduct($name, $type, $parameters =[] )
    {
        $data = [
            'name' => $name,
            'type' => $type,
        ];

        if (is_array($parameters) && !empty($parameters)) {
            $data = array_merge($parameters, $data);
        }

        return Product::create($data);
    }

    /**
     * @param string $productId
     * @param string $interval
     * @param null  $currency Currency to billin , defaults to 'eur'
     * @param array $parameters
     * @return Plan
     */
    public function createPlan($productId, $interval, $currency = null, $parameters = [] )
    {

        if($currency === null){
            $currency = 'eur';
        }

        $data = [
            'product' => $productId,
            'interval' => $interval,
            'currency' =>$currency,
        ];

        if (is_array($parameters) && !empty($parameters)) {
            $data = array_merge($parameters, $data);
        }

        return Plan::create($data);

    }

    /**
     * @param string $id
     * @param string $duration
     * @param bool  $isPercentage True = percentage_type deduction, false = amount_type
     * @param int|float $discount The percentage discount, or amount discount
     * @param array $parameters Additional parameters to pass to the constructor
     * @return Coupon
     */
    public function createCoupon($id, $duration, $isPercentage = true, $discount, $parameters = [])
    {

        $data = [
            "id" => $id,
            "duration" => $duration,
        ];

        if($isPercentage){
            $data['percent_off'] = $discount;
        } else {
            $data['amount_off'] = $discount;
        }

        if (is_array($parameters) && !empty($parameters)) {
            $data = array_merge($parameters, $data);
        }

        return Coupon::create($data);
    }
}
