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
}
