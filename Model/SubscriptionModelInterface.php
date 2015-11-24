<?php

namespace Aimir\StripeBundle\Model;

interface SubscriptionModelInterface extends StripeModelInterface
{
    /**
    * @return float
    */
    public function getApplicationFeePercent();

    /**
     * @return boolean
     */
    public function isCancelAtPeriodEnd();

    /**
     * @return \DateTime
     */
    public function getCanceledAt();

    /**
     * @return \DateTime
     */
    public function getCurrentPeriodEnd();

    /**
     * @return \DateTime
     */
    public function getCurrentPeriodStart();

    /**
     * @return string
     */
    public function getCustomer();

    /**
     * @return string
     */
    public function getCoupon();

    /**
     * @param string $coupon
     *
     * @return $this
     */
    public function setCoupon($coupon);

    /**
     * @return \DateTime
     */
    public function getEndedAt();

    /**
     * @return string
     */
    public function getPlan();

    /**
     * @param string $plan
     *
     * @return $this
     */
    public function setPlan($plan);

    /**
     * @return int
     */
    public function getQuantity();

    /**
     * @return \DateTime
     */
    public function getStart();

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @return float
     */
    public function getTaxPercent();

    /**
     * @return \DateTime
     */
    public function getTrialEnd();

    /**
     * @return \DateTime
     */
    public function getTrialStart();

    /**
     * @return bool
     */
    public function isRefundable();

    /**
     * @return bool
     */
    public function isPendingRefund();

    /**
     * Defines that subscription is active
     *
     * @return bool
     */
    public function isActive();

    /**
     * Defines that subscription in past_due status
     *
     * @return bool
     */
    public function isPastDue();
}
