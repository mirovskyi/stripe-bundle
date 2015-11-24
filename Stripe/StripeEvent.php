<?php

namespace Aimir\StripeBundle\Stripe;

use Stripe\Event as StripeEventApi;
use Stripe\StripeObject;

class StripeEvent
{
    /**
     * Object name in stripe
     */
    const STRIPE_OBJECT = 'event';

    /**
     * Get event api
     *
     * @return StripeEventApi
     */
    public function api()
    {
        return new StripeEventApi();
    }

    /**
     * Retrieve event object
     *
     * @param string $id
     *
     * @return StripeObject
     */
    public function retrieve($id)
    {
        return StripeEventApi::retrieve($id);
    }
}
