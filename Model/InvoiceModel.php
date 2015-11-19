<?php

namespace Aimir\StripeBundle\Model;

use Stripe\StripeObject;

class InvoiceModel extends StripeModelAbstract implements InvoiceModelInterface
{
    /**
     * @var int
     */
    protected $amountDue;

    /**
     * @var int
     */
    protected $attemptCount;

    /**
     * @var bool
     */
    protected $attempted;

    /**
     * @var bool
     */
    protected $closed;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $customer;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var bool
     */
    protected $forgiven;

    /**
     * @var bool
     */
    protected $paid;

    /**
     * @var \DateTime
     */
    protected $periodStart;

    /**
     * @var \DateTime
     */
    protected $periodEnd;

    /**
     * @var int
     */
    protected $startingBalance;

    /**
     * @var int
     */
    protected $subtotal;

    /**
     * @var int
     */
    protected $total;

    /**
     * @var int
     */
    protected $applicationFee;

    /**
     * @var string
     */
    protected $charge;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $endingBalance;

    /**
     * @var \DateTime
     */
    protected $nextPaymentAttempt;

    /**
     * @var string
     */
    protected $receiptNumber;

    /**
     * @var string
     */
    protected $statementDescriptor;

    /**
     * @var string
     */
    protected $subscription;

    /**
     * @var \DateTime
     */
    protected $webhooksDeliveredAt;

    /**
     * @var int
     */
    protected $subscriptionProrationDate;

    /**
     * @var int
     */
    protected $tax;

    /**
     * @var float
     */
    protected $taxPercent;

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
     * @return boolean
     */
    public function isAttempted()
    {
        return $this->attempted;
    }

    /**
     * @param boolean $attempted
     *
     * @return $this
     */
    public function setAttempted($attempted)
    {
        $this->attempted = $attempted;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isClosed()
    {
        return $this->closed;
    }

    /**
     * @param boolean $closed
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
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isForgiven()
    {
        return $this->forgiven;
    }

    /**
     * @param boolean $forgiven
     *
     * @return $this
     */
    public function setForgiven($forgiven)
    {
        $this->forgiven = $forgiven;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isPaid()
    {
        return $this->paid;
    }

    /**
     * @param boolean $paid
     *
     * @return $this
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPeriodStart()
    {
        return $this->periodStart;
    }

    /**
     * @param \DateTime $periodStart
     *
     * @return $this
     */
    public function setPeriodStart($periodStart)
    {
        $this->periodStart = $periodStart;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPeriodEnd()
    {
        return $this->periodEnd;
    }

    /**
     * @param \DateTime $periodEnd
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
     * @return \DateTime
     */
    public function getNextPaymentAttempt()
    {
        return $this->nextPaymentAttempt;
    }

    /**
     * @param \DateTime $nextPaymentAttempt
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
     * @return \DateTime
     */
    public function getWebhooksDeliveredAt()
    {
        return $this->webhooksDeliveredAt;
    }

    /**
     * @param \DateTime $webhooksDeliveredAt
     *
     * @return $this
     */
    public function setWebhooksDeliveredAt($webhooksDeliveredAt)
    {
        $this->webhooksDeliveredAt = $webhooksDeliveredAt;

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
     * Initialize model object from stripe data
     *
     * @param StripeObject $object
     * @return $this
     */
    public function initFromStripeObject(StripeObject $object)
    {
        $this
            ->setStripeId($object['id'])
            ->setAmountDue($object['amount_due'])
            ->setCurrency($object['currency'])
            ->setDate(\DateTime::createFromFormat('U', $object['date']))
            ->setPeriodStart(\DateTime::createFromFormat('U', $object['period_start']))
            ->setPeriodEnd(\DateTime::createFromFormat('U', $object['period_end']))
            ->setStartingBalance($object['starting_balance'])
            ->setSubtotal($object['subtotal'])
            ->setTotal($object['total'])
            ->setReceiptNumber($object['receipt_number'])
            ->setTax($object['tax'])
            ->setLivemode($object['livemode'])
            ->setDescription($object['description'])
            ->updateFromStripeObject($object)
        ;
    }

    /**
     * Update model object from stripe data
     *
     * @param StripeObject $object
     * @return $this
     */
    public function updateFromStripeObject(StripeObject $object)
    {
        $this
            ->setClosed($object['closed'])
            ->setForgiven($object['forgiven'])
            ->setPaid($object['paid'])
            ->setApplicationFee($object['application_fee'])
            ->setCharge($object['charge'])
            ->setStatementDescriptor($object['statementDescriptor'])
            ->setMetadata($object['metadata'])
            ->setTaxPercent($object['taxPercent'])
            ->setWebhooksDeliveredAt(\DateTime::createFromFormat('U', $object['webhooks_delivered_at']))
            ->setSubscriptionProrationDate($object['subscription_prorate_date'])
            ->setAttemptCount($object['attempt_count'])
            ->setAttempted($object['attempted'])
            ->setNextPaymentAttempt($object['next_payment_attempt'])
            ->setEndingBalance($object['ending_balance'])
        ;

        return $this;
    }
}