<?php

namespace Aimir\StripeBundle\Model;

interface CardModelInterface extends StripeModelInterface
{
    /**
     * @return string
     */
    public function getBrand();

    /**
     * @return integer
     */
    public function getExpMonth();

    /**
     * @return integer
     */
    public function getExpYear();

    /**
     * @return string
     */
    public function getFunding();

    /**
     * @return string
     */
    public function getLast4();

    /**
     * @return string
     */
    public function getAddressCity();

    /**
     * @return string
     */
    public function getAddressCountry();

    /**
     * @return string
     */
    public function getAddressLine1();

    /**
     * @return string
     */
    public function getAddressLine1Check();

    /**
     * @return string
     */
    public function getAddressLine2();

    /**
     * @return string
     */
    public function getAddressState();

    /**
     * @return string
     */
    public function getAddressZip();

    /**
     * @return string
     */
    public function getAddressZipCheck();

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @return CustomerModelInterface
     */
    public function getCustomer();

    /**
     * @return string
     */
    public function getCvcCheck();

    /**
     * @return string
     */
    public function getDynamicLast4();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getRecipient();

    /**
     * @return string
     */
    public function getFingerprint();
}
