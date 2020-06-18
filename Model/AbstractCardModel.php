<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

/**
 * @Annotation
 */
abstract class AbstractCardModel extends StripeModel
{
    /**
     * @StripeObjectParam(name="address_city")
     *
     * @var string
     */
    protected $addressCity;

    /**
     * @StripeObjectParam(name="address_country")
     *
     * @var string
     */
    protected $addressCountry;

    /**
     * @StripeObjectParam(name="address_line1")
     *
     * @var string
     */
    protected $addressLine1;

    /**
     * @StripeObjectParam(name="address_line1_check")
     *
     * @var string
     */
    protected $addressLine1Check;

    /**
     * @StripeObjectParam(name="address_line2")
     *
     * @var string
     */
    protected $addressLine2;

    /**
     * @StripeObjectParam(name="address_state")
     *
     * @var string
     */
    protected $addressState;

    /**
     * @StripeObjectParam(name="address_zip")
     *
     * @var string
     */
    protected $addressZip;

    /**
     * @StripeObjectParam(name="address_zip_check")
     *
     * @var string
     */
    protected $addressZipCheck;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $brand;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $country;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $customer;

    /**
     * @StripeObjectParam(name="cvc_check")
     *
     * @var string
     */
    protected $cvcCheck;

    /**
     * @StripeObjectParam(name="dynamic_last4")
     *
     * @var string
     */
    protected $dynamicLast4;

    /**
     * @StripeObjectParam(name="exp_month")
     *
     * @var int
     */
    protected $expMonth;

    /**
     * @StripeObjectParam(name="exp_year")
     *
     * @var int
     */
    protected $expYear;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $fingerprint;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $funding;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $last4;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $name;

    /**
     * @StripeObjectParam
     *
     * @var array
     */
    protected $metadata;

    /**
     * @StripeObjectParam(name="tokenization_method")
     *
     * @var string
     */
    protected $tokenizationMethod;

    /**
     * @return string
     */
    public function getAddressCity()
    {
        return $this->addressCity;
    }

    /**
     * @param string $addressCity
     *
     * @return $this
     */
    public function setAddressCity($addressCity)
    {
        $this->addressCity = $addressCity;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressCountry()
    {
        return $this->addressCountry;
    }

    /**
     * @param string $addressCountry
     *
     * @return $this
     */
    public function setAddressCountry($addressCountry)
    {
        $this->addressCountry = $addressCountry;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @param string $addressLine1
     *
     * @return $this
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine1Check()
    {
        return $this->addressLine1Check;
    }

    /**
     * @param string $addressLine1Check
     *
     * @return $this
     */
    public function setAddressLine1Check($addressLine1Check)
    {
        $this->addressLine1Check = $addressLine1Check;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @param string $addressLine2
     *
     * @return $this
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressState()
    {
        return $this->addressState;
    }

    /**
     * @param string $addressState
     *
     * @return $this
     */
    public function setAddressState($addressState)
    {
        $this->addressState = $addressState;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressZip()
    {
        return $this->addressZip;
    }

    /**
     * @param string $addressZip
     *
     * @return $this
     */
    public function setAddressZip($addressZip)
    {
        $this->addressZip = $addressZip;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressZipCheck()
    {
        return $this->addressZipCheck;
    }

    /**
     * @param string $addressZipCheck
     *
     * @return $this
     */
    public function setAddressZipCheck($addressZipCheck)
    {
        $this->addressZipCheck = $addressZipCheck;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     *
     * @return $this
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

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
    public function getCvcCheck()
    {
        return $this->cvcCheck;
    }

    /**
     * @param string $cvcCheck
     *
     * @return $this
     */
    public function setCvcCheck($cvcCheck)
    {
        $this->cvcCheck = $cvcCheck;

        return $this;
    }

    /**
     * @return string
     */
    public function getDynamicLast4()
    {
        return $this->dynamicLast4;
    }

    /**
     * @param string $dynamicLast4
     *
     * @return $this
     */
    public function setDynamicLast4($dynamicLast4)
    {
        $this->dynamicLast4 = $dynamicLast4;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpMonth()
    {
        return $this->expMonth;
    }

    /**
     * @param int $expMonth
     *
     * @return $this
     */
    public function setExpMonth($expMonth)
    {
        $this->expMonth = $expMonth;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpYear()
    {
        return $this->expYear;
    }

    /**
     * @param int $expYear
     *
     * @return $this
     */
    public function setExpYear($expYear)
    {
        $this->expYear = $expYear;

        return $this;
    }

    /**
     * @return string
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param string $fingerprint
     *
     * @return $this
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;

        return $this;
    }

    /**
     * @return string
     */
    public function getFunding()
    {
        return $this->funding;
    }

    /**
     * @param string $funding
     *
     * @return $this
     */
    public function setFunding($funding)
    {
        $this->funding = $funding;

        return $this;
    }

    /**
     * @return string
     */
    public function getLast4()
    {
        return $this->last4;
    }

    /**
     * @param string $last4
     *
     * @return $this
     */
    public function setLast4($last4)
    {
        $this->last4 = $last4;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

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
    public function getTokenizationMethod()
    {
        return $this->tokenizationMethod;
    }

    /**
     * @param string $tokenizationMethod
     *
     * @return $this
     */
    public function setTokenizationMethod($tokenizationMethod)
    {
        $this->tokenizationMethod = $tokenizationMethod;

        return $this;
    }
}
