<?php

namespace Aimir\StripeBundle\Stripe\Model;

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
}