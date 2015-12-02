<?php

namespace Aimir\StripeBundle\Stripe;

use Stripe\Charge as StripeChargeApi;

class StripeCharge
{
    /**
     * Object name in stripe
     */
    const STRIPE_OBJECT = 'charge';

    /**
     * Get stripe charge API
     *
     * @return StripeChargeApi
     */
    public function api()
    {
        return new StripeChargeApi();
    }

    /**
     * Create new charge
     *
     * @param int $amount
     * @param string $currency
     * @param array $params
     *
     * @return \Stripe\Charge
     */
    public function create($amount, $currency, $params = null)
    {
        $params = array_merge(array('amount' => $amount, 'currency' => $currency), $params);

        return StripeChargeApi::create($params);
    }

    /**
     * Retrieve stripe charge object
     *
     * @param string $id Charge StripeID
     *
     * @return \Stripe\Charge
     */
    public function retrieve($id)
    {
        return StripeChargeApi::retrieve($id);
    }
}
