<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractCustomerModel extends StripeModel
{
    /**
     * @StripeObjectParam(name="account_balance")
     *
     * @var int
     */
    protected $accountBalance;

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
     * @StripeObjectParam
     *
     * @var string
     */
    protected $currency;

    /**
     * @StripeObjectParam(name="default_source")
     *
     * @var string
     */
    protected $defaultSource;

    /**
     * @StripeObjectParam
     *
     * @var bool
     */
    protected $delinquent;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $description;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $email;

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
     * @StripeObjectParam
     *
     * @var array
     */
    protected $shipping;

    /**
     * @return int
     */
    public function getAccountBalance()
    {
        return $this->accountBalance;
    }

    /**
     * @param int $accountBalance
     *
     * @return $this
     */
    public function setAccountBalance($accountBalance)
    {
        $this->accountBalance = $accountBalance;

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
    public function getDefaultSource()
    {
        return $this->defaultSource;
    }

    /**
     * @param string $defaultSource
     *
     * @return $this
     */
    public function setDefaultSource($defaultSource)
    {
        $this->defaultSource = $defaultSource;

        return $this;
    }

    /**
     * @return string
     */
    public function getDelinquent()
    {
        return $this->delinquent;
    }

    /**
     * @param string $delinquent
     *
     * @return $this
     */
    public function setDelinquent($delinquent)
    {
        $this->delinquent = $delinquent;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

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
     * @return array
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param array $shipping
     *
     * @return $this
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;

        return $this;
    }

    /**
     * @return \Stripe\Customer
     */
    public function retrieveStripeObject()
    {
        return \Stripe\Customer::retrieve($this->getStripeId());
    }
}
