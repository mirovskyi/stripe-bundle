<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractTaxIdModel extends StripeModel
{
    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $country;

    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $created;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $customer;

    /**
     * @StripeObjectParam
     *
     * @var bool
     */
    protected $livemode;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $type;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $value;

    /**
     * @StripeObjectParam
     *
     * @var array
     */
    protected $verification;

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * Set Country.
     *
     * @param string $country
     *
     * @return AbstractTaxIdModel
     */
    public function setCountry(string $country): AbstractTaxIdModel
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreated(): int
    {
        return $this->created;
    }

    /**
     * Set Created.
     *
     * @param int $created
     *
     * @return AbstractTaxIdModel
     */
    public function setCreated(int $created): AbstractTaxIdModel
    {
        $this->created = $created;

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
     * Set Customer.
     *
     * @param string $customer
     *
     * @return AbstractTaxIdModel
     */
    public function setCustomer( $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return bool
     */
    public function isLivemode(): bool
    {
        return $this->livemode;
    }

    /**
     * Set Livemode.
     *
     * @param bool $livemode
     *
     * @return AbstractTaxIdModel
     */
    public function setLivemode(bool $livemode): AbstractTaxIdModel
    {
        $this->livemode = $livemode;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set Type.
     *
     * @param string $type
     *
     * @return AbstractTaxIdModel
     */
    public function setType(string $type): AbstractTaxIdModel
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Set Value.
     *
     * @param string $value
     *
     * @return AbstractTaxIdModel
     */
    public function setValue(string $value): AbstractTaxIdModel
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function getVerification(): array
    {
        return $this->verification;
    }

    /**
     * Set Verification.
     *
     * @param array $verification
     *
     * @return AbstractTaxIdModel
     */
    public function setVerification(array $verification): AbstractTaxIdModel
    {
        $this->verification = $verification;

        return $this;
    }

}
