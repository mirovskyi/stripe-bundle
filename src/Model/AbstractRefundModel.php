<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractRefundModel extends StripeModel
{
    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $amount;

    /**
     * @StripeObjectParam(name="balance_transaction")
     *
     * @var string
     */
    protected $balanceTransaction;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $charge;

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
     * @var array
     */
    protected $metadata;

    /**
     * @StripeObjectParam(name="failure_balance_transaction")
     *
     * @var string
     */
    protected $failureBalanceTransaction;

    /**
     * @StripeObjectParam(name="failure_reason")
     *
     * @var string
     */
    protected $failureReason;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $reason;

    /**
     * @StripeObjectParam(name="receipt_number")
     *
     * @var string
     */
    protected $receiptNumber;

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
    public function getFailureBalanceTransaction()
    {
        return $this->failureBalanceTransaction;
    }

    /**
     * @param string $failureBalanceTransaction
     *
     * @return $this
     */
    public function setFailureBalanceTransaction($failureBalanceTransaction)
    {
        $this->failureBalanceTransaction = $failureBalanceTransaction;

        return $this;
    }

    /**
     * @return string
     */
    public function getFailureReason()
    {
        return $this->failureReason;
    }

    /**
     * @param string $failureReason
     *
     * @return $this
     */
    public function setFailureReason($failureReason)
    {
        $this->failureReason = $failureReason;

        return $this;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     *
     * @return $this
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

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
