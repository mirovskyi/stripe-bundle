<?php

namespace Aimir\StripeBundle\Model;

interface InvoiceModelInterface extends StripeModelInterface
{
    /**
     * @return int
     */
    public function getAmountDue();

    /**
     * @return int
     */
    public function getAttemptCount();

    /**
     * @return bool
     */
    public function isAttempted();

    /**
     * @return bool
     */
    public function isClosed();

    /**
     * @return string
     */
    public function getCurrency();

    /**
     * @return string
     */
    public function getCustomer();

    /**
     * @return \DateTime
     */
    public function getDate();

    /**
     * @return bool
     */
    public function isForgiven();

    /**
     * @return bool
     */
    public function isPaid();

    /**
     * @return \DateTime
     */
    public function getPeriodStart();

    /**
     * @return \DateTime
     */
    public function getPeriodEnd();

    /**
     * @return int
     */
    public function getStartingBalance();

    /**
     * @return int
     */
    public function getSubtotal();

    /**
     * @return int
     */
    public function getTotal();

    /**
     * @return int
     */
    public function getApplicationFee();

    /**
     * @return string
     */
    public function getCharge();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return int
     */
    public function getEndingBalance();

    /**
     * @return \DateTime
     */
    public function getNextPaymentAttempt();

    /**
     * @return string
     */
    public function getReceiptNumber();

    /**
     * @return string
     */
    public function getStatementDescriptor();

    /**
     * @return string
     */
    public function getSubscription();

    /**
     * @return \DateTime
     */
    public function getWebhooksDeliveredAt();

    /**
     * @return int
     */
    public function getSubscriptionProrationDate();

    /**
     * @return int
     */
    public function getTax();

    /**
     * @return float
     */
    public function getTaxPercent();
}
