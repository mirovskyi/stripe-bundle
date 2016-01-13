<?php

namespace Aimir\StripeBundle\Model;

use Stripe\Object as StripeObject;

abstract class SubscriptionModel extends StripeModelAbstract implements SubscriptionModelInterface
{
    /**
     * @var float
     */
    protected $applicationFeePercent;

    /**
     * @var bool
     */
    protected $cancelAtPeriodEnd;

    /**
     * @var \DateTime
     */
    protected $canceledAt;

    /**
     * @var \DateTime
     */
    protected $currentPeriodEnd;

    /**
     * @var \DateTime
     */
    protected $currentPeriodStart;

    /**
     * @var string
     */
    protected $customer;

    /**
     * @var string
     */
    protected $coupon;

    /**
     * @var \DateTime
     */
    protected $endedAt;

    /**
     * @var string
     */
    protected $plan;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var \DateTime
     */
    protected $start;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var float
     */
    protected $taxPercent;

    /**
     * @var \DateTime
     */
    protected $trialEnd;

    /**
     * @var \DateTime
     */
    protected $trialStart;

    /**
     * @var bool
     */
    protected $refundable;

    /**
     * @var bool
     */
    protected $pendingRefund;

    /**
     * @var bool
     */
    protected $active;

    /**
     * @var bool
     */
    protected $pastDue;

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
     * @return \DateTime
     */
    public function getCanceledAt()
    {
        return $this->canceledAt;
    }

    /**
     * @param \DateTime $canceledAt
     *
     * @return $this
     */
    public function setCanceledAt($canceledAt)
    {
        $this->canceledAt = $canceledAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCurrentPeriodEnd()
    {
        return $this->currentPeriodEnd;
    }

    /**
     * @param \DateTime $currentPeriodEnd
     *
     * @return $this
     */
    public function setCurrentPeriodEnd($currentPeriodEnd)
    {
        $this->currentPeriodEnd = $currentPeriodEnd;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCurrentPeriodStart()
    {
        return $this->currentPeriodStart;
    }

    /**
     * @param \DateTime $currentPeriodStart
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
     * @return \DateTime
     */
    public function getEndedAt()
    {
        return $this->endedAt;
    }

    /**
     * @param \DateTime $endedAt
     *
     * @return $this
     */
    public function setEndedAt($endedAt)
    {
        $this->endedAt = $endedAt;

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
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param \DateTime $start
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
     * @return \DateTime
     */
    public function getTrialEnd()
    {
        return $this->trialEnd;
    }

    /**
     * @param \DateTime $trialEnd
     *
     * @return $this
     */
    public function setTrialEnd($trialEnd)
    {
        $this->trialEnd = $trialEnd;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTrialStart()
    {
        return $this->trialStart;
    }

    /**
     * @param \DateTime $trialStart
     *
     * @return $this
     */
    public function setTrialStart($trialStart)
    {
        $this->trialStart = $trialStart;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isRefundable()
    {
        return $this->refundable;
    }

    /**
     * @param boolean $refundable
     *
     * @return $this
     */
    public function setRefundable($refundable)
    {
        $this->refundable = $refundable;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isPendingRefund()
    {
        return $this->pendingRefund;
    }

    /**
     * @param boolean $pendingRefund
     *
     * @return $this
     */
    public function setPendingRefund($pendingRefund)
    {
        $this->pendingRefund = $pendingRefund;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     *
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isPastDue()
    {
        return $this->pastDue;
    }

    /**
     * @param boolean $pastDue
     *
     * @return $this
     */
    public function setPastDue($pastDue)
    {
        $this->pastDue = $pastDue;

        return $this;
    }

    /**
     * Initialize model object from stripe data
     *
     * @param StripeObject $object
     *
     * @return $this
     */
    public function initFromStripeObject(StripeObject $object)
    {
        $this
            ->setStripeId($object['id'])
            ->setCustomer($object['customer'])
            ->setStart($object['start']?\DateTime::createFromFormat('U', $object['start']):null)
            ->updateFromStripeObject($object)
        ;

        return $this;
    }

    /**
     * Update model object from stripe data
     *
     * @param StripeObject $object
     *
     * @return $this
     */
    public function updateFromStripeObject(StripeObject $object)
    {
        $this
            ->setCancelAtPeriodEnd($object['cancel_at_period_end'])
            ->setQuantity($object['quantity'])
            ->setStatus($object['status'])
            ->setApplicationFeePercent($object['application_fee_percent'])
            ->setCanceledAt($object['canceled_at']?\DateTime::createFromFormat('U', $object['canceled_at']):null)
            ->setCurrentPeriodEnd($object['current_period_end']?\DateTime::createFromFormat('U', $object['current_period_end']):null)
            ->setCurrentPeriodStart($object['current_period_start']?\DateTime::createFromFormat('U', $object['current_period_start']):null)
            ->setEndedAt($object['endedAt']?\DateTime::createFromFormat('U', $object['endedAt']):null)
            ->setTrialEnd($object['trialEnd']?\DateTime::createFromFormat('U', $object['trialEnd']):null)
            ->setTrialStart($object['trialStart']?\DateTime::createFromFormat('U', $object['trialStart']):null)
            ->setTaxPercent($object['taxPercent'])
            ->setMetadata($object['metadata'])
            ->setPlan($object['plan'] ? $object['plan']['id'] : null)
            ->setCoupon(($object['discount'] && $object['discount']['coupon'])?$object['discount']['coupon']['id']:null)
        ;

        return $this;
    }
}