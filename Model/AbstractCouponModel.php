<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractCouponModel extends StripeModel
{
    /**
     * @StripeObjectParam(name="amount_off")
     *
     * @var int
     */
    protected $amountOff;

    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $created;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $currency;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $duration;

    /**
     * @StripeObjectParam(name="duration_in_months")
     *
     * @var int
     */
    protected $durationInMonths;

    /**
     * @StripeObjectParam
     *
     * @var bool
     */
    protected $livemode;

    /**
     * @StripeObjectParam
     *
     * @var array
     */
    protected $metadata;

    /**
     * @StripeObjectParam(name="max_redemptions")
     *
     * @var int
     */
    protected $maxRedemptions;

    /**
     * @StripeObjectParam(name="percent_off")
     *
     * @var int
     */
    protected $percentOff;

    /**
     * @StripeObjectParam(name="redeem_by")
     *
     * @var int
     */
    protected $redeemBy;

    /**
     * @StripeObjectParam(name="times_redeemed")
     *
     * @var int
     */
    protected $timesRedeemed;

    /**
     * @StripeObjectParam
     *
     * @var bool
     */
    protected $valid;

    /**
     * @return int
     */
    public function getAmountOff()
    {
        return $this->amountOff;
    }

    /**
     * @param int $amountOff
     *
     * @return $this
     */
    public function setAmountOff($amountOff)
    {
        $this->amountOff = $amountOff;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param int $created
     *
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     *
     * @return $this
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return int
     */
    public function getDurationInMonths()
    {
        return $this->durationInMonths;
    }

    /**
     * @param int $durationInMonths
     *
     * @return $this
     */
    public function setDurationInMonths($durationInMonths)
    {
        $this->durationInMonths = $durationInMonths;

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
     * @param bool $livemode
     *
     * @return $this
     */
    public function setLivemode($livemode)
    {
        $this->livemode = $livemode;

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
     * @return int
     */
    public function getMaxRedemptions()
    {
        return $this->maxRedemptions;
    }

    /**
     * @param int $maxRedemptions
     *
     * @return $this
     */
    public function setMaxRedemptions($maxRedemptions)
    {
        $this->maxRedemptions = $maxRedemptions;

        return $this;
    }

    /**
     * @return int
     */
    public function getPercentOff()
    {
        return $this->percentOff;
    }

    /**
     * @param int $percentOff
     *
     * @return $this
     */
    public function setPercentOff($percentOff)
    {
        $this->percentOff = $percentOff;

        return $this;
    }

    /**
     * @return int
     */
    public function getRedeemBy()
    {
        return $this->redeemBy;
    }

    /**
     * @param int $redeemBy
     *
     * @return $this
     */
    public function setRedeemBy($redeemBy)
    {
        $this->redeemBy = $redeemBy;

        return $this;
    }

    /**
     * @return int
     */
    public function getTimesRedeemed()
    {
        return $this->timesRedeemed;
    }

    /**
     * @param int $timesRedeemed
     *
     * @return $this
     */
    public function setTimesRedeemed($timesRedeemed)
    {
        $this->timesRedeemed = $timesRedeemed;

        return $this;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @param bool $valid
     *
     * @return $this
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }
}
