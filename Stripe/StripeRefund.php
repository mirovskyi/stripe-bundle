<?php

namespace Aimir\StripeBundle\Stripe;

use Stripe\Refund as StripeRefundApi;
use Stripe\StripeObject;

class StripeRefund
{
    /**
     * Object name in stripe
     */
    const STRIPE_OBJECT = 'refund';

    /**
     * Get stripe refund API
     *
     * @return StripeRefundApi
     */
    public function api()
    {
        return new StripeRefundApi();
    }

    /**
     * Create new refund
     *
     * @param string $charge
     * @param array|null $params
     *
     * @return Stripe\Refund
     */
    public function create($charge, $params = null)
    {
        $params = array_merge(array('charge' => $charge), $params);

        return StripeRefundApi::create($params);
    }

    /**
     * Retrieve stripe refund
     *
     * @param string $id
     *
     * @return Stripe\Refund
     */
    public function retrieve($id)
    {
        return StripeRefundApi::retrieve($id);
    }
}
