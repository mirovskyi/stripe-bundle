<?php

namespace Aimir\StripeBundle\Model;

use Stripe\StripeObject;

abstract class CouponModel extends StripeModelAbstract implements CouponModelInterface
{
    /**
     * @var string
     */
    protected $duration;

    /**
     * @var int
     */
    protected $amountOff;

    /**
     * @var int
     */
    protected $percentOff;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var int
     */
    protected $durationInMonths;

    /**
     * @var int
     */
    protected $maxRedemptions;

    /**
     * @var int
     */
    protected $timesRedeemed;

    /**
     * @var int
     */
    protected $redeemBy;

    /**
     * @var bool
     */
    protected $valid;

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
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
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
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @param boolean $valid
     *
     * @return $this
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function initFromStripeObject(StripeObject $object)
    {
        $this
            ->setStripeId($object['id'])
            ->setDuration($object['duration'])
            ->setDurationInMonths($object['duration_in_months'])
            ->setAmountOff($object['amount_off'])
            ->setPercentOff($object['percent_off'])
            ->setLivemode($object['livemode'])
            ->setCreated(\DateTime::createFromFormat('U', $object['created']))
            ->setMaxRedemptions($object['max_redemptions'])
            ->updateFromStripeObject($object)
        ;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function updateFromStripeObject(StripeObject $object)
    {
        $this
            ->setMetadata($object['metadata'])
            ->setTimesRedeemed($object['times_redeemed'])
            ->setRedeemBy($object['redeem_by'])
            ->setValid($object['valid'])
        ;

        return $this;
    }
}
