<?php

namespace Aimir\StripeBundle\Model;

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
     * Get model metadata
     *
     * @return array
     */
    public function getMetadata();

    /**
     * Live mode
     *
     * @return boolean
     */
    public function isLivemode();

    /**
     * Initialize model object from stripe data
     *
     * @param StripeObject $object
     * @return $this
     */
    public function initFromStripeObject(StripeObject $object);

    /**
     * Update model object from stripe data
     *
     * @param StripeObject $object
     * @return $this
     */
    public function updateFromStripeObject(StripeObject $object);
}
