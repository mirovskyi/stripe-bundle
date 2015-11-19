<?php

namespace Aimir\StripeBundle\Model;

use Stripe\StripeObject;

abstract class StripeModelAbstract implements StripeModelInterface
{
    /**
     * @var string
     */
    protected $stripeId;

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @var bool
     */
    protected $livemode;

    /**
     * Initialize model object from stripe data
     *
     * @param StripeObject $object
     * @return $this
     */
    abstract public function initFromStripeObject(StripeObject $object);

    /**
     * Update model object from stripe data
     *
     * @param StripeObject $object
     * @return $this
     */
    abstract public function updateFromStripeObject(StripeObject $object);

    /**
     * Retrieve stripe object ID
     *
     * @return string
     */
    public function getStripeId()
    {
        return $this->stripeId;
    }

    /**
     * @param string $stripeId
     *
     * @return $this
     */
    public function setStripeId($stripeId)
    {
        $this->stripeId = $stripeId;

        return $this;
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     *
     * @return $this
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @return bool
     */
    public function isLivemode()
    {
        return $this->livemode;
    }

    /**
     * @param $livemode
     *
     * @return $this
     */
    public function setLivemode($livemode)
    {
        $this->livemode = $livemode;

        return $this;
    }
}
