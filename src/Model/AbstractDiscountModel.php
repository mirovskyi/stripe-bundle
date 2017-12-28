<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

class AbstractDiscountModel extends StripeModel
{
    /**
     * @StripeObjectParam(embeddedId="id")
     *
     * @var string
     */
    protected $coupon;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $customer;

    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $end;

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
    protected $subscription;

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
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param int $end
     *
     * @return $this
     */
    public function setEnd($end)
    {
        $this->end = $end;

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
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * @param string $subscription
     *
     * @return $this
     */
    public function setSubscription($subscription)
    {
        $this->subscription = $subscription;

        return $this;
    }
}
