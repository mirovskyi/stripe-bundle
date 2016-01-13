<?php

namespace Aimir\StripeBundle\Model;

interface CouponModelInterface extends StripeModelInterface
{
    /**
     * Duration types
     */
    const DURATION_ONCE = 'once';
    const DURATION_FOREVER = 'forever';
    const DURATION_REPEATING = 'repeating';

    /**
     * @return int
     */
    public function getAmountOff();

    /**
     * @return int
     */
    public function getPercentOff();

    /**
     * @return \DateTime
     */
    public function getCreated();

    /**
     * @return string
     */
    public function getCurrency();

    /**
     * @return string
     */
    public function getDuration();

    /**
     * @return int
     */
    public function getDurationInMonths();

    /**
     * @return int
     */
    public function getMaxRedemptions();

    /**
     * @return int
     */
    public function getRedeemBy();

    /**
     * @return int
     */
    public function getTimesRedeemed();

    /**
     * @return bool
     */
    public function isValid();

    /**
     * Live mode
     *
     * @return boolean
     */
    public function isLivemode();
}