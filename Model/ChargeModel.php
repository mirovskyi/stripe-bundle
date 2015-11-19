<?php

namespace Aimir\StripeBundle\Model;

use Doctrine\Common\Collections\Collection;
use Stripe\StripeObject;

abstract class ChargeModel extends StripeModelAbstract implements ChargeModelInterface
{
    /**
     * @var int
     */
    protected $amount;

    /**
     * @var bool
     */
    protected $captured;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var bool
     */
    protected $paid;

    /**
     * @var bool
     */
    protected $refunded;

    /**
     * @var string
     */
    protected $source;

    /**
     * @var string
     */
    protected $status;
    /**
     * @var int
     */
    protected $amountRefunded;

    /**
     * @var string
     */
    protected $balanceTransaction;

    /**
     * @var string
     */
    protected $customer;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var array
     */
    protected $dispute;

    /**
     * @var string
     */
    protected $failureCode;

    /**
     * @var string
     */
    protected $failureMessage;

    /**
     * @var string
     */
    protected $invoice;

    /**
     * @var string
     */
    protected $receiptEmail;

    /**
     * @var string
     */
    protected $receiptNumber;

    /**
     * @var array
     */
    protected $fraudDetails;

    /**
     * @var array
     */
    protected $shipping;

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
     * @return boolean
     */
    public function isCaptured()
    {
        return $this->captured;
    }

    /**
     * @param boolean $captured
     *
     * @return $this
     */
    public function setCaptured($captured)
    {
        $this->captured = $captured;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
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
     * @return boolean
     */
    public function isRefunded()
    {
        return $this->refunded;
    }

    /**
     * @param boolean $refunded
     *
     * @return $this
     */
    public function setRefunded($refunded)
    {
        $this->refunded = $refunded;

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
     * @return array
     */
    public function getDispute()
    {
        return $this->dispute;
    }

    /**
     * @param array $dispute
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
     * Initialize model object from stripe data
     *
     * @param StripeObject $object
     * @return $this
     */
    public function initFromStripeObject(StripeObject $object)
    {
        $this
            ->setStripeId($object['id'])
            ->setAmount($object['amount'])
            ->setCustomer($object['customer'])
            ->setSource($object['source'])
            ->setInvoice($object['invoice'])
            ->setCreated(\DateTime::createFromFormat('U', $object['created']))
            ->setCurrency($object['currency'])
            ->setShipping($object['shipping'] ? $object['shipping']->serializeParameters() : [])
            ->setLivemode($object['livemode'])
            ->updateFromStripeObject($object)
        ;

        return $this;
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
            ->setPaid($object['paid'])
            ->setBalanceTransaction($object['balance_transaction'])
            ->setFailureCode($object['failure_code'])
            ->setFailureMessage($object['failure_message'])
            ->setReceiptEmail($object['receipt_email'])
            ->setReceiptNumber($object['receipt_number'])
            ->setFraudDetails($object['fraud_details'])
            ->setDescription($object['description'])
            ->setCaptured($object['captured'])
            ->setRefunded($object['refunded'])
            ->setStatus($object['status'])
            ->setAmountRefunded($object['amount_refunded'])
            ->setDispute($object['dispute'] ? $object['dispute']->serializeParameters() : [])
            ->setMetadata($object['metadata']->__toArray())
        ;

        return $this;
    }
}