<?php

namespace Aimir\StripeBundle\Stripe\Model;

class StripeAddressModel
{
    /**
     * @var string
     */
    protected $line1;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $line2;

    /**
     * @var string
     */
    protected $postalCode;

    /**
     * @var string
     */
    protected $state;

    /**
     * @return string
     */
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * @param string $line1
     *
     * @return $this
     */
    public function setLine1($line1)
    {
        $this->line1 = $line1;

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
    public function getLine2()
    {
        return $this->line2;
    }

    /**
     * @param string $line2
     *
     * @return $this
     */
    public function setLine2($line2)
    {
        $this->line2 = $line2;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     *
     * @return $this
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

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
     * Convert to array in stripe format
     *
     * @see https://stripe.com/docs/api#customer_object
     * @return array
     */
    public function toArray()
    {
        return array(
            'line1' => $this->getLine1(),
            'city' => $this->getCity(),
            'country' => $this->getCountry(),
            'line2' => $this->getLine2(),
            'postal_code' => $this->getPostalCode(),
            'state' => $this->getState()
        );
    }
}
