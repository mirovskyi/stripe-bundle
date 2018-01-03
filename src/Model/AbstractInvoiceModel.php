<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractInvoiceModel extends StripeModel
{
    /**
     * @StripeObjectParam(name="amount_due")
     *
     * @var int
     */
    protected $amountDue;

    /**
     * @StripeObjectParam(name="application_fee")
     *
     * @var int
     */
    protected $applicationFee;

    /**
     * @StripeObjectParam(name="attempt_count")
     *
     * @var int
     */
    protected $attemptCount;

    /**
     * @StripeObjectParam
     *
     * @var bool
     */
    protected $attempted;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $billing;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $charge;

    /**
     * @StripeObjectParam
     *
     * @var bool
     */
    protected $closed;

    /**
     * @StripeObjectParam(name="discount", embeddedId="coupon.id")
     *
     * @var string
     */
    protected $coupon;

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
    protected $customer;

    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $date;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $description;

    /**
     * @StripeObjectParam(name="due_date")
     *
     * @var int
     */
    protected $dueDate;

    /**
     * @StripeObjectParam(name="ending_balance")
     *
     * @var int
     */
    protected $endingBalance;

    /**
     * @StripeObjectParam
     *
     * @var bool
     */
    protected $forgiven;

    /**
     * @StripeObjectParam
     *
     * @var array
     */
    protected $lines;

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
     * @StripeObjectParam(name="next_payment_attempt")
     *
     * @var int
     */
    protected $nextPaymentAttempt;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $number;

    /**
     * @StripeObjectParam
     *
     * @var bool
     */
    protected $paid;

    /**
     * @StripeObjectParam(name="period_end")
     *
     * @var int
     */
    protected $periodEnd;

    /**
     * @StripeObjectParam(name="period_start")
     *
     * @var int
     */
    protected $periodStart;

    /**
     * @StripeObjectParam(name="receipt_number")
     *
     * @var string
     */
    protected $receiptNumber;

    /**
     * @StripeObjectParam(name="starting_balance")
     *
     * @var int
     */
    protected $startingBalance;

    /**
     * @StripeObjectParam(name="statement_descriptor")
     *
     * @var string
     */
    protected $statementDescriptor;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $subscription;

    /**
     * @StripeObjectParam(name="subscription_proration_date")
     *
     * @var int
     */
    protected $subscriptionProrationDate;

    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $subtotal;

    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $tax;

    /**
     * @StripeObjectParam(name="tax_percent")
     *
     * @var float
     */
    protected $taxPercent;

    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $total;

    /**
     * @StripeObjectParam(name="webhooks_delivered_at")
     *
     * @var int
     */
    protected $webhooksDeliveredAt;

    /**
     * @return int
     */
    public function getAmountDue()
    {
        return $this->amountDue;
    }

    /**
     * @param int $amountDue
     *
     * @return $this
     */
    public function setAmountDue($amountDue)
    {
        $this->amountDue = $amountDue;

        return $this;
    }

    /**
     * @return int
     */
    public function getApplicationFee()
    {
        return $this->applicationFee;
    }

    /**
     * @param int $applicationFee
     *
     * @return $this
     */
    public function setApplicationFee($applicationFee)
    {
        $this->applicationFee = $applicationFee;

        return $this;
    }

    /**
     * @return int
     */
    public function getAttemptCount()
    {
        return $this->attemptCount;
    }

    /**
     * @param int $attemptCount
     *
     * @return $this
     */
    public function setAttemptCount($attemptCount)
    {
        $this->attemptCount = $attemptCount;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAttempted()
    {
        return $this->attempted;
    }

    /**
     * @param bool $attempted
     *
     * @return $this
     */
    public function setAttempted($attempted)
    {
        $this->attempted = $attempted;

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
     * @return string
     */
    public function getCharge()
    {
        return $this->charge;
    }

    /**
     * @param string $charge
     *
     * @return $this
     */
    public function setCharge($charge)
    {
        $this->charge = $charge;

        return $this;
    }

    /**
     * @return bool
     */
    public function isClosed()
    {
        return $this->closed;
    }

    /**
     * @param bool $closed
     *
     * @return $this
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;

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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param int $date
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

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
     * @return int
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param int $dueDate
     *
     * @return $this
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getEndingBalance()
    {
        return $this->endingBalance;
    }

    /**
     * @param int $endingBalance
     *
     * @return $this
     */
    public function setEndingBalance($endingBalance)
    {
        $this->endingBalance = $endingBalance;

        return $this;
    }

    /**
     * @return bool
     */
    public function isForgiven()
    {
        return $this->forgiven;
    }

    /**
     * @param bool $forgiven
     *
     * @return $this
     */
    public function setForgiven($forgiven)
    {
        $this->forgiven = $forgiven;

        return $this;
    }

    /**
     * @return array
     */
    public function getLines()
    {
        return $this->lines;
    }

    /**
     * @param array $lines
     *
     * @return $this
     */
    public function setLines($lines)
    {
        $this->lines = $lines;

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
    public function getNextPaymentAttempt()
    {
        return $this->nextPaymentAttempt;
    }

    /**
     * @param int $nextPaymentAttempt
     *
     * @return $this
     */
    public function setNextPaymentAttempt($nextPaymentAttempt)
    {
        $this->nextPaymentAttempt = $nextPaymentAttempt;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPaid()
    {
        return $this->paid;
    }

    /**
     * @param bool $paid
     *
     * @return $this
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * @return int
     */
    public function getPeriodEnd()
    {
        return $this->periodEnd;
    }

    /**
     * @param int $periodEnd
     *
     * @return $this
     */
    public function setPeriodEnd($periodEnd)
    {
        $this->periodEnd = $periodEnd;

        return $this;
    }

    /**
     * @return int
     */
    public function getPeriodStart()
    {
        return $this->periodStart;
    }

    /**
     * @param int $periodStart
     *
     * @return $this
     */
    public function setPeriodStart($periodStart)
    {
        $this->periodStart = $periodStart;

        return $this;
    }

    /**
     * @return string
     */
    public function getReceiptNumber()
    {
        return $this->receiptNumber;
    }

    /**
     * @param string $receiptNumber
     *
     * @return $this
     */
    public function setReceiptNumber($receiptNumber)
    {
        $this->receiptNumber = $receiptNumber;

        return $this;
    }

    /**
     * @return int
     */
    public function getStartingBalance()
    {
        return $this->startingBalance;
    }

    /**
     * @param int $startingBalance
     *
     * @return $this
     */
    public function setStartingBalance($startingBalance)
    {
        $this->startingBalance = $startingBalance;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatementDescriptor()
    {
        return $this->statementDescriptor;
    }

    /**
     * @param string $statementDescriptor
     *
     * @return $this
     */
    public function setStatementDescriptor($statementDescriptor)
    {
        $this->statementDescriptor = $statementDescriptor;

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

    /**
     * @return int
     */
    public function getSubscriptionProrationDate()
    {
        return $this->subscriptionProrationDate;
    }

    /**
     * @param int $subscriptionProrationDate
     *
     * @return $this
     */
    public function setSubscriptionProrationDate($subscriptionProrationDate)
    {
        $this->subscriptionProrationDate = $subscriptionProrationDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * @param int $subtotal
     *
     * @return $this
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * @return int
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @param int $tax
     *
     * @return $this
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

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
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     *
     * @return $this
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return int
     */
    public function getWebhooksDeliveredAt()
    {
        return $this->webhooksDeliveredAt;
    }

    /**
     * @param int $webhooksDeliveredAt
     *
     * @return $this
     */
    public function setWebhooksDeliveredAt($webhooksDeliveredAt)
    {
        $this->webhooksDeliveredAt = $webhooksDeliveredAt;

        return $this;
    }
}