<?php

namespace Aimir\StripeBundle\Stripe\Model;

class StripeShippingModel
{
    /**
     * @var StripeAddressModel
     */
    protected $address;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @return StripeAddressModel
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param StripeAddressModel $address
     *
     * @return $this
     */
    public function setAddress(StripeAddressModel $address)
    {
        $this->address = $address;

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
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

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
            'name' => $this->getName(),
            'phone' => $this->getPhone(),
            'address' => $this->getAddress() ? $this->getAddress()->toArray() : null
        );
    }
}
