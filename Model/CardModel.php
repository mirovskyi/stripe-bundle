<?php

namespace Aimir\StripeBundle\Model;

use Stripe\StripeObject;

abstract class CardModel extends StripeModelAbstract implements CardModelInterface
{
    /**
     * @var string
     */
    protected $brand;

    /**
     * @var int
     */
    protected $expMonth;

    /**
     * @var int
     */
    protected $expYear;

    /**
     * @var string
     */
    protected $funding;

    /**
     * @var string
     */
    protected $last4;

    /**
     * @var string
     */
    protected $addressCity;

    /**
     * @var string
     */
    protected $addressCountry;

    /**
     * @var string
     */
    protected $addressLine1;

    /**
     * @var string
     */
    protected $addressLine1Check;

    /**
     * @var string
     */
    protected $addressLine2;

    /**
     * @var string
     */
    protected $addressState;

    /**
     * @var string
     */
    protected $addressZip;

    /**
     * @var string
     */
    protected $addressZipCheck;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $customer;

    /**
     * @var string
     */
    protected $cvcCheck;

    /**
     * @var string
     */
    protected $dynamicLast4;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $recipient;

    /**
     * @var string
     */
    protected $fingerprint;

    /**
     * @return mixed
     */
    abstract public function getId();

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return $this
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

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
     * @return string
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param string $recipient
     *
     * @return $this
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

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
     * Initialize model object from stripe data
     *
     * @param StripeObject $object
     * @return $this
     */
    public function initFromStripeObject(StripeObject $object)
    {
        $this
            ->setStripeId($object['id'])
            ->setCustomer($object['customer'])
            ->setBrand($object['brand'])
            ->setLast4($object['last4'])
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
            ->setCvcCheck($object['cvc_check'])
            ->setDynamicLast4($object['dynamic_last4'])
            ->setRecipient($object['recipient'])
            ->setFingerprint($object['fingerprint'])
            ->setLivemode($object['livemode'])
            ->setCountry($object['country'])
            ->setFunding($object['funding'])
            ->setExpMonth($object['exp_month'])
            ->setExpYear($object['exp_year'])
            ->setAddressCity($object['address_city'])
            ->setAddressCountry($object['address_country'])
            ->setAddressLine1($object['address_line1'])
            ->setAddressLine1Check($object['address_line1_check'])
            ->setAddressLine2($object['address_line2'])
            ->setAddressState($object['address_state'])
            ->setAddressZip($object['address_zip'])
            ->setAddressZipCheck($object['address_zip_check'])
            ->setName($object['name'])
            ->setMetadata($object['metadata'])
        ;

        return $this;
    }
}
