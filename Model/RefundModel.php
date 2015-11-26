<?php

namespace Aimir\StripeBundle\Model;

use Stripe\StripeObject;

abstract class RefundModel extends StripeModelAbstract implements RefundModelInterface
{
    /**
     * @var int
     */
    protected $amount;

    /**
     * @var string
     */
    protected $balanceTransaction;

    /**
     * @var string
     */
    protected $charge;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $reason;

    /**
     * @var string
     */
    protected $receiptNumber;

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
     * {@inheritdoc}
     */
    public function initFromStripeObject(StripeObject $object)
    {
        $this
            ->setStripeId($object['id'])
            ->setCreated(\DateTime::createFromFormat('U', $object['created']))
            ->setAmount($object['amount'])
            ->setCharge($object['charge'])
            ->setCurrency($object['currency'])
            ->setBalanceTransaction($object['balance_transaction'])
            ->setDescription($object['description'])
            ->setReason($object['reason'])
            ->setReceiptNumber($object['receipt_number'])
            ->updateFromStripeObject($object)
        ;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function updateFromStripeObject(StripeObject $object)
    {
        $this->setMetadata($object['metadata']);

        return $this;
    }
}
