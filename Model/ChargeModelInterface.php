<?php

namespace Aimir\StripeBundle\Model;

interface ChargeModelInterface extends StripeModelInterface
{
    /**
     * @return integer
     */
    public function getAmount();

    /**
     * @return boolean
     */
    public function isCaptured();

    /**
     * @return \DateTime
     */
    public function getCreated();

    /**
     * @return string
     */
    public function getCurrency();

    /**
     * @return boolean
     */
    public function isPaid();

    /**
     * @return boolean
     */
    public function isRefunded();

    /**
     * @return string
     */
    public function getSource();

    /**
     * @param CardModelInterface $source
     *
     * @return $this
     */
    public function setSource($source);

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @return integer
     */
    public function getAmountRefunded();

    /**
     * @return string
     */
    public function getBalanceTransaction();

    /**
     * @return string
     */
    public function getCustomer();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getFailureCode();

    /**
     * @return string
     */
    public function getFailureMessage();

    /**
     * @return string
     */
    public function getInvoice();

    /**
     * @return string
     */
    public function getReceiptEmail();

    /**
     * @return string
     */
    public function getReceiptNumber();

    /**
     * @return array
     */
    public function getFraudDetails();

    /**
     * @return array
     */
    public function getShipping();
}
