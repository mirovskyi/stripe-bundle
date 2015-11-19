<?php

namespace Aimir\StripeBundle\Model;

interface RefundModelInterface extends StripeModelInterface
{
    /**
     * Possible refund reasons
     */
    const REASON_DUPLICATE = 'duplicate';
    const REASON_FRAUDULENT = 'fraudulent';
    const REASON_CUSTOMER_REQUEST = 'requested_by_customer';

    /**
     * @return int
     */
    public function getAmount();

    /**
     * @return string
     */
    public function getBalanceTransaction();

    /**
     * @return string
     */
    public function getCharge();

    /**
     * @return \DateTime
     */
    public function getCreated();

    /**
     * @return string
     */
    public function getCurrency();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getReason();

    /**
     * @return string
     */
    public function getReceiptNumber();
}
