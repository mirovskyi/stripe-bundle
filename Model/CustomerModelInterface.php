<?php

namespace Aimir\StripeBundle\Model;

interface CustomerModelInterface extends StripeModelInterface
{
    /**
     * @return integer
     */
    public function getAccountBalance();

    /**
     * @return string
     */
    public function getCurrency();

    /**
     * @return CardModelInterface
     */
    public function getDefaultSource();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @return \DateTime
     */
    public function getCreated();

    /**
     * @return bool
     */
    public function isDelinquent();

    /**
     * @return array
     */
    public function getShipping();
}
