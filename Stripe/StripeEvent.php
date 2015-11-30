<?php

namespace Aimir\StripeBundle\Stripe;

use Stripe\Event as StripeEventApi;

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
     * @return Stripe\Event
     */
    public function retrieve($id)
    {
        return StripeEventApi::retrieve($id);
    }
}
