<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractSubscriptionModel extends StripeModel
{
    /**
     * @StripeObjectParam(name="application_fee_percent")
     *
     * @var float
     */
    protected $applicationFeePercent;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $billing;

    /**
     * @StripeObjectParam(name="cancel_at_period_end")
     *
     * @var bool
     */
    protected $cancelAtPeriodEnd;

    /**
     * @StripeObjectParam(name="canceled_at")
     *
     * @var int
     */
    protected $canceledAt;

    /**
     * @StripeObjectParam(name="discount", embeddedId="coupon.id")
     *
     * @var string
     */
    protected $coupon;

    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $created;

    /**
     * @StripeObjectParam(name="current_period_end")
     *
     * @var int
     */
    protected $currentPeriodEnd;

    /**
     * @StripeObjectParam(name="current_period_start")
     *
     * @var int
     */
    protected $currentPeriodStart;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $customer;

    /**
     * @StripeObjectParam(name="days_until_due")
     *
     * @var int
     */
    protected $daysUntilDue;

    /**
     * @StripeObjectParam(name="ended_at")
     *
     * @var int
     */
    protected $endedAt;

    /**
     * @StripeObjectParam
     *
     * @var array
     */
    protected $items;

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
     * @StripeObjectParam(embeddedId="id")
     *
     * @var string
     */
    protected $plan;

    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $quantity;

    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $start;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $status;

    /**
     * @StripeObjectParam(name="tax_percent")
     *
     * @var float
     */
    protected $taxPercent;

    /**
     * @StripeObjectParam(name="trial_end")
     *
     * @var int
     */
    protected $trialEnd;

    /**
     * @StripeObjectParam(name="trial_start")
     *
     * @var int
     */
    protected $trialStart;

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
        $this->applicationFeePercent = $applicationFeePercent;

        return $this;
    }

    /**
     * @return string
     */
    public function getBilling()
    {
        return $this->billing;
    }

    /**
     * @param string $billing
     *
     * @return $this
     */
    public function setBilling($billing)
    {
        $this->billing = $billing;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCancelAtPeriodEnd()
    {
        return $this->cancelAtPeriodEnd;
    }

    /**
     * @param bool $cancelAtPeriodEnd
     *
     * @return $this
     */
    public function setCancelAtPeriodEnd($cancelAtPeriodEnd)
    {
        $this->cancelAtPeriodEnd = $cancelAtPeriodEnd;

        return $this;
    }

    /**
     * @return int
     */
    public function getCanceledAt()
    {
        return $this->canceledAt;
    }

    /**
     * @param int $canceledAt
     *
     * @return $this
     */
    public function setCanceledAt($canceledAt)
    {
        $this->canceledAt = $canceledAt;

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
     * @return int
     */
    public function getCurrentPeriodEnd()
    {
        return $this->currentPeriodEnd;
    }

    /**
     * @param int $currentPeriodEnd
     *
     * @return $this
     */
    public function setCurrentPeriodEnd($currentPeriodEnd)
    {
        $this->currentPeriodEnd = $currentPeriodEnd;

        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentPeriodStart()
    {
        return $this->currentPeriodStart;
    }

    /**
     * @param int $currentPeriodStart
     *
     * @return $this
     */
    public function setCurrentPeriodStart($currentPeriodStart)
    {
        $this->currentPeriodStart = $currentPeriodStart;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param string $customer
     *
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return int
     */
    public function getDaysUntilDue()
    {
        return $this->daysUntilDue;
    }

    /**
     * @param int $daysUntilDue
     *
     * @return $this
     */
    public function setDaysUntilDue($daysUntilDue)
    {
        $this->daysUntilDue = $daysUntilDue;

        return $this;
    }

    /**
     * @return int
     */
    public function getEndedAt()
    {
        return $this->endedAt;
    }

    /**
     * @param int $endedAt
     *
     * @return $this
     */
    public function setEndedAt($endedAt)
    {
        $this->endedAt = $endedAt;

        return $this;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param array $items
     *
     * @return $this
     */
    public function setItems($items)
    {
        $this->items = $items;

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
     * @return int
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param int $start
     *
     * @return $this
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

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
        $this->taxPercent = $taxPercent;

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
     * @return int
     */
    public function getTrialStart()
    {
        return $this->trialStart;
    }

    /**
     * @param int $trialStart
     *
     * @return $this
     */
    public function setTrialStart($trialStart)
    {
        $this->trialStart = $trialStart;

        return $this;
    }
}
