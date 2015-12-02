<?php

namespace Aimir\StripeBundle\Stripe;

use Stripe\Invoice as StripeInvoiceApi;

class StripeInvoice
{
    /**
     * Object name in stripe
     */
    const STRIPE_OBJECT = 'invoice';

    /**
     * Get stripe invoice API
     *
     * @return StripeInvoiceApi
     */
    public function api()
    {
        return new StripeInvoiceApi();
    }

    /**
     * Create new stripe invoice
     *
     * @param $customer
     * @param null $params
     *
     * @return \Stripe\Invoice
     */
    public function create($customer, $params = null)
    {
        $params = array_merge(array('customer' => $customer), $params);

        return StripeInvoiceApi::create($params);
    }

    /**
     * Retrieve stripe invoice object
     *
     * @param string $id Invoice StripeID
     *
     * @return \Stripe\Invoice
     */
    public function retrieve($id)
    {
        return StripeInvoiceApi::retrieve($id);
    }
}
