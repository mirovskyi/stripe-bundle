<?php

namespace Miracode\StripeBundle\Model;

use Stripe\StripeObject;

interface StripeModelInterface
{
    /**
     * Retrieve stripe object ID
     *
     * return string
     */
    public function getStripeId();

    /**
     * Update model object from stripe data
     *
     * @param StripeObject $object
     * @return $this
     */
    public function populateFromStripeObject(StripeObject $object);
}
