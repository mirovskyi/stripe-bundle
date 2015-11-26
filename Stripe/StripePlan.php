<?php

namespace Aimir\StripeBundle\Stripe;

use Aimir\StripeBundle\Stripe\Model\Plan;
use Stripe\Plan as StripePlanApi;

class StripePlan
{
    /**
     * Object name in stripe
     */
    const STRIPE_OBJECT = 'plan';

    /**
     * Get stripe invoice API
     *
     * @return StripePlanApi
     */
    public function api()
    {
        return new StripePlanApi();
    }

    /**
     * Create stripe plan
     *
     * @param Plan $plan
     *
     * @return Stripe\Plan
     */
    public function create(Plan $plan)
    {
        return StripePlanApi::create($plan->toArray());
    }

    /**
     * Retrieve stripe plan
     *
     * @param string $id Plan StripeID
     *
     * @return Stripe\Plan
     */
    public function retrieve($id)
    {
        return StripePlanApi::retrieve($id);
    }
}
