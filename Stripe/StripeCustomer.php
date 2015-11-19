<?php

namespace Aimir\StripeBundle\Stripe;

use Aimir\StripeBundle\Stripe\Model\Customer;
use Stripe\Customer as StripeCustomerApi;
use Stripe\StripeObject;

class StripeCustomer
{
    /**
     * Object name in stripe
     */
    const STRIPE_OBJECT = 'customer';

    /**
     * Create stripe customer
     *
     * @param Customer $customer
     *
     * @return StripeObject
     */
    public function create(Customer $customer)
    {
        $params = [
            'email' => $customer->getEmail(),
            'description' => $customer->getDescription(),
            'account_balance' => $customer->getAccountBalance(),
            'quantity' => $customer->getQuantity() ?: 1,
            'tax_percent' => $customer->getTaxPercent(),
            'trial_end' => $customer->getTrialEnd(),
            'plan' => $customer->getPlan(),
            'coupon' => $customer->getCoupon()
        ];
        if ($card = $customer->getSource()) {
            $params['source'] = [
                'object' => StripeCard::STRIPE_OBJECT,
                'number' => $card->getNumber(),
                'exp_month' => $card->getExpMonth(),
                'exp_year' => $card->getExpYear(),
                'cvc' => $card->getCvc(),
                'name' => $card->getCardholder()
            ];
        }
        if ($shipping = $customer->getShipping()) {
            $shippingParams = [
                'name' => $shipping->getName(),
                'phone' => $shipping->getPhone()
            ];
            if ($address = $shipping->getAddress()) {
                $shippingParams['address'] = [
                    'line1' => $address->getLine1(),
                    'city' => $address->getCity(),
                    'country' => $address->getCountry(),
                    'line2' => $address->getLine2(),
                    'postal_code' => $address->getPostalCode(),
                    'state' => $address->getState()
                ];
            }
            $params['shipping'] = $shippingParams;
        }

        return StripeCustomerApi::create($params);
    }

    /**
     * Get customer api
     *
     * @return StripeCustomerApi
     */
    public function api()
    {
        return new StripeCustomerApi;
    }

    /**
     * Retrieve stripe customer
     *
     * @param string $id
     *
     * @return StripeObject
     */
    public function retrieve($id)
    {
        return StripeCustomerApi::retrieve($id);
    }

    /**
     * Get all customers
     *
     * @param array|null $params
     *
     * @return \Stripe\Collection
     */
    public function all($params = null)
    {
        return StripeCustomerApi::all($params);
    }
}
