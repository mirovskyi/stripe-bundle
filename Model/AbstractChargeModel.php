<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractChargeModel extends StripeModel
{
    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $amount;

    /**
     * @StripeObjectParam(name="amount_refunded")
     *
     * @var int
     */
    protected $amountRefunded;

    /**
     * @StripeObjectParam(name="balance_transaction")
     *
     * @var string
     */
    protected $balanceTransaction;

    /**
     * @StripeObjectParam
     *
     * @var bool
     */
    protected $captured;

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
     * @StripeObjectParam
     *
     * @var string
     */
    protected $customer;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $dispute;

    /**
     * @StripeObjectParam(name="failure_code")
     *
     * @var string
     */
    protected $failureCode;

    /**
     * @StripeObjectParam(name="failure_message")
     *
     * @var string
     */
    protected $failureMessage;

    /**
     * @StripeObjectParam(name="fraud_details")
     *
     * @var array
     */
    protected $fraudDetails;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $invoice;

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
     * @var string
     */
    protected $order;

    /**
     * @StripeObjectParam
     *
     * @var array
     */
    protected $outcome;

    /**
     * @StripeObjectParam
     *
     * @var bool
     */
    protected $paid;

    /**
     * @StripeObjectParam(name="receipt_email")
     *
     * @var string
     */
    protected $receiptEmail;

    /**
     * @StripeObjectParam(name="receipt_number")
     *
     * @var string
     */
    protected $receiptNumber;

    /**
     * @StripeObjectParam
     *
     * @var bool
     */
    protected $refunded;

    /**
     * @StripeObjectParam
     *
     * @var array
     */
    protected $shipping;

    /**
     * @StripeObjectParam(embeddedId="id")
     *
     * @var string
     */
    protected $source;

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
    protected $status;

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmountRefunded()
    {
        return $this->amountRefunded;
    }

    /**
     * @param int $amountRefunded
     *
     * @return $this
     */
    public function setAmountRefunded($amountRefunded)
    {
        $this->amountRefunded = $amountRefunded;

        return $this;
    }

    /**
     * @return string
     */
    public function getBalanceTransaction()
    {
        return $this->balanceTransaction;
    }

    /**
     * @param string $balanceTransaction
     *
     * @return $this
     */
    public function setBalanceTransaction($balanceTransaction)
    {
        $this->balanceTransaction = $balanceTransaction;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCaptured()
    {
        return $this->captured;
    }

    /**
     * @param bool $captured
     *
     * @return $this
     */
    public function setCaptured($captured)
    {
        $this->captured = $captured;

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
    public function getDispute()
    {
        return $this->dispute;
    }

    /**
     * @param string $dispute
     *
     * @return $this
     */
    public function setDispute($dispute)
    {
        $this->dispute = $dispute;

        return $this;
    }

    /**
     * @return string
     */
    public function getFailureCode()
    {
        return $this->failureCode;
    }

    /**
     * @param string $failureCode
     *
     * @return $this
     */
    public function setFailureCode($failureCode)
    {
        $this->failureCode = $failureCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getFailureMessage()
    {
        return $this->failureMessage;
    }

    /**
     * @param string $failureMessage
     *
     * @return $this
     */
    public function setFailureMessage($failureMessage)
    {
        $this->failureMessage = $failureMessage;

        return $this;
    }

    /**
     * @return array
     */
    public function getFraudDetails()
    {
        return $this->fraudDetails;
    }

    /**
     * @param array $fraudDetails
     *
     * @return $this
     */
    public function setFraudDetails($fraudDetails)
    {
        $this->fraudDetails = $fraudDetails;

        return $this;
    }

    /**
     * @return string
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param string $invoice
     *
     * @return $this
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;

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
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param string $order
     *
     * @return $this
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return array
     */
    public function getOutcome()
    {
        return $this->outcome;
    }

    /**
     * @param array $outcome
     *
     * @return $this
     */
    public function setOutcome($outcome)
    {
        $this->outcome = $outcome;

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
     * @return string
     */
    public function getReceiptEmail()
    {
        return $this->receiptEmail;
    }

    /**
     * @param string $receiptEmail
     *
     * @return $this
     */
    public function setReceiptEmail($receiptEmail)
    {
        $this->receiptEmail = $receiptEmail;

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
     * @return bool
     */
    public function isRefunded()
    {
        return $this->refunded;
    }

    /**
     * @param bool $refunded
     *
     * @return $this
     */
    public function setRefunded($refunded)
    {
        $this->refunded = $refunded;

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
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     *
     * @return $this
     */
    public function setSource($source)
    {
        $this->source = $source;

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
}
