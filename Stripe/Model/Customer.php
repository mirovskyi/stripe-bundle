<?php

namespace Aimir\StripeBundle\Stripe\Model;

use Aimir\StripeBundle\Stripe\StripeCard;

class Customer
{
    /**
     * @var int
     */
    protected $accountBalance;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $plan;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var string
     */
    protected $coupon;

    /**
     * @var Card
     */
    protected $source;

    /**
     * @var Shipping
     */
    protected $shipping;

    /**
     * @var int
     */
    protected $taxPercent;

    /**
     * @var int
     */
    protected $trialEnd;

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
     * @return Card
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param Card $source
     *
     * @return $this
     */
    public function setSource(Card $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return Shipping
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param Shipping $shipping
     *
     * @return $this
     */
    public function setShipping(Shipping $shipping)
    {
        $this->shipping = $shipping;

        return $this;
    }

    /**
     * @return int
     */
    public function getTaxPercent()
    {
        return $this->taxPercent;
    }

    /**
     * @param int $taxPercent
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
     * Convert to array in stripe format
     *
     * @see https://stripe.com/docs/api#create_customer
     * @return array
     */
    public function toArray()
    {
        $result = array(
            'email' => $this->getEmail(),
            'description' => $this->getDescription(),
            'account_balance' => $this->getAccountBalance(),
            'quantity' => $this->getQuantity() ?: 1,
            'tax_percent' => $this->getTaxPercent(),
            'trial_end' => $this->getTrialEnd(),
            'plan' => $this->getPlan(),
            'coupon' => $this->getCoupon(),
            'source' => $this->getSource() ? $this->getSource()->toArray() : null,
            'shipping' => $this->getShipping() ? $this->getShipping()->toArray() : null
        );

        return $result;
    }
}
