<?php

namespace Aimir\StripeBundle\Stripe;

use Aimir\StripeBundle\StripeException;
use Stripe\Coupon as StripeCouponApi;

class StripeCoupon
{
    /**
     * Duration constants
     */
    const DURATION_FOREVER = 'forever';
    const DURATION_ONCE = 'once';
    const DURATION_REPEATING = 'repeating';

    /**
     * Object name in stripe
     */
    const STRIPE_OBJECT = 'coupon';

    /**
     * Get stripe coupon API
     *
     * @return StripeCouponApi
     */
    public function api()
    {
        return new StripeCouponApi();
    }

    /**
     * Create new coupon
     *
     * @param string $duration
     * @param array|null $params
     *
     * @return Stripe\Coupon
     * @throws StripeException
     */
    public function create($duration, $params = null)
    {
        if (empty($params['amount_off']) && empty($params['percent_off'])) {
            throw new StripeException('Coupon should have amount or percent off');
        }
        if (!empty($params['amount_off']) && empty('currency')) {
            throw new StripeException('Coupon should have currency for amount off');
        }
        if ($duration == self::DURATION_REPEATING && empty($params['duration_in_months'])) {
            throw new StripeException('Coupon should have duration_in_months for repeating duration');
        }
        $params = array_merge(array('duration' => $duration), $params);

        return StripeCouponApi::create($params);
    }

    /**
     * Retrieve stripe coupon object
     *
     * @param string $id Coupon StripeID
     *
     * @return Stripe\Coupon
     */
    public function retrieve($id)
    {
        return StripeCouponApi::retrieve($id);
    }
}
