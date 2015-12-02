<?php

namespace Aimir\StripeBundle\Stripe\Model;

class StripeSubscriptionModel
{
    /**
     * @var float
     */
    protected $applicationFeePercent;

    /**
     * @var string
     */
    protected $coupon;

    /**
     * @var string
     */
    protected $plan;

    /**
     * @var StripeCardModel
     */
    protected $source;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var float
     */
    protected $taxPercent;

    /**
     * @var int
     */
    protected $trialEnd;

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @return float
     */
    public function getApplicationFeePercent()
    {
        return $this->applicationFeePercent;
    }

    /**
     * @param float $applicationFeePercent
     *
     * @return $this
     */
    public function setApplicationFeePercent($applicationFeePercent)
    {
        $this->applicationFeePercent = round($applicationFeePercent, 2);

        return $this;
    }

    /**
     * @return string
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * @param string $coupon
     *
     * @return $this
     */
    public function setCoupon($coupon)
    {
        $this->coupon = $coupon;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * @param string $plan
     *
     * @return $this
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * @return StripeCardModel
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param StripeCardModel $source
     *
     * @return $this
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return float
     */
    public function getTaxPercent()
    {
        return $this->taxPercent;
    }

    /**
     * @param float $taxPercent
     *
     * @return $this
     */
    public function setTaxPercent($taxPercent)
    {
        $this->taxPercent = round($taxPercent, 2);

        return $this;
    }

    /**
     * @return int
     */
    public function getTrialEnd()
    {
        return $this->trialEnd;
    }

    /**
     * @param int $trialEnd
     *
     * @return $this
     */
    public function setTrialEnd($trialEnd)
    {
        $this->trialEnd = $trialEnd;

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
     * Convert to array in stripe format
     *
     * @see https://stripe.com/docs/api#create_subscription
     * @return array
     */
    public function toArray()
    {
        return array(
            'application_fee_percent' => $this->getApplicationFeePercent(),
            'coupon' => $this->getCoupon(),
            'plan' => $this->getPlan(),
            'source' => $this->getSource() ? $this->getSource()->toArray() : null,
            'quantity' => $this->getQuantity(),
            'metadata' => $this->getMetadata(),
            'tax_percent' => $this->getTaxPercent(),
            'trial_end' => $this->getTrialEnd()
        );
    }
}
