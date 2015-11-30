<?php

namespace Aimir\StripeBundle\Stripe;

use Aimir\StripeBundle\Stripe\Model\Card;
use Aimir\StripeBundle\Stripe\Model\Customer;
use Aimir\StripeBundle\Stripe\Model\Subscription;
use Stripe\Customer as StripeCustomerApi;

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
     * @return Stripe\Customer
     */
    public function create(Customer $customer)
    {
        return StripeCustomerApi::create($customer->toArray());
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
     * @return Stripe\Customer
     */
    public function retrieve($id)
    {
        return StripeCustomerApi::retrieve($id);
    }

    /**
     * Create new card source
     *
     * @param string $customer Customer StripeID
     * @param Card $card
     * @param array|null $params
     *
     * @return Stripe\Card
     */
    public function createCard($customer, Card $card, $params = null)
    {
        //Create credit card source
        $source = $card->toArray();
        //Request params
        $params = array_merge(array('source' => $source), $params);

        //Retrieve API for given customer
        $customerApi = $this->retrieve($customer);

        return $customerApi->sources->create($params);
    }

    /**
     * Retrieve stripe card object
     *
     * @param string $customer Customer StripeID
     * @param string $id Card StripeID
     *
     * @return Stripe\Card
     */
    public function retrieveCard($customer, $id)
    {
        $customerApi = $this->retrieve($customer);

        return $customerApi->sources->retrieve($id);
    }

    /**
     * Create new stripe subscription
     *
     * @param string $customer Customer StripeID
     * @param Subscription $subscription
     *
     * @return Stripe\Subscription
     */
    public function createSubscription($customer, Subscription $subscription)
    {
        //Retrieve API for given customer
        $customerApi = $this->retrieve($customer);

        return $customerApi->subscriptions->create($subscription->toArray());
    }

    /**
     * Retrieve stripe subscription object
     *
     * @param string $customer Customer StripeID
     * @param string $id Subscription StripeID
     *
     * @return Stripe\Subscription
     */
    public function retrieveSubscription($customer, $id)
    {
        $customerApi = $this->retrieve($customer);

        return $customerApi->subscriptions->retrieve($id);
    }
}
