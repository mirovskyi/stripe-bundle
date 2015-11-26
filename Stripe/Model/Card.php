<?php

namespace Aimir\StripeBundle\Stripe\Model;

use Aimir\StripeBundle\Stripe\StripeCard;

class Card
{
    /**
     * @var string
     */
    protected $number;

    /**
     * @var int
     */
    protected $expMonth;

    /**
     * @var int
     */
    protected $expYear;

    /**
     * @var int
     */
    protected $cvc;

    /**
     * @var string
     */
    protected $cardholder;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $addressLine1;

    /**
     * @var string
     */
    protected $addressLine2;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $zip;

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

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
     * @return int
     */
    public function getCvc()
    {
        return $this->cvc;
    }

    /**
     * @param int $cvc
     *
     * @return $this
     */
    public function setCvc($cvc)
    {
        $this->cvc = $cvc;

        return $this;
    }

    /**
     * @return string
     */
    public function getCardholder()
    {
        return $this->cardholder;
    }

    /**
     * @param string $cardholder
     *
     * @return $this
     */
    public function setCardholder($cardholder)
    {
        $this->cardholder = $cardholder;

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
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

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
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     *
     * @return $this
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Convert to array in stripe format
     *
     * @see https://stripe.com/docs/api#create_card
     * @return array
     */
    public function toArray()
    {
        return array(
            'object' => StripeCard::STRIPE_OBJECT,
            'exp_month' => $this->getExpMonth(),
            'exp_year' => $this->getExpYear(),
            'number' => $this->getNumber(),
            'address_city' => $this->getCity(),
            'address_country' => $this->getCountry(),
            'address_line1' => $this->getAddressLine1(),
            'address_line2' => $this->getAddressLine2(),
            'address_state' => $this->getState(),
            'address_zip' => $this->getZip(),
            'cvc' => $this->getCvc(),
            'name' => $this->getCardholder()
        );
    }
}