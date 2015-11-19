<?php

namespace Aimir\StripeBundle\Model;

use Stripe\StripeObject;

class CustomerModel extends StripeModelAbstract implements CustomerModelInterface
{
    /**
     * @var int
     */
    protected $accountBalance;
    /**
     * @var string
     */
    protected $currency;

    /**
     * @var CardModelInterface
     */
    protected $defaultSource;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var bool
     */
    protected $delinquent;

    /**
     * @var array
     */
    protected $shipping;

    /**
     * @return int
     */
    public function getAccountBalance()
    {
        return $this->accountBalance;
    }

    /**
     * @param int $accountBalance
     *
     * @return $this
     */
    public function setAccountBalance($accountBalance)
    {
        $this->accountBalance = $accountBalance;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return CardModelInterface
     */
    public function getDefaultSource()
    {
        return $this->defaultSource;
    }

    /**
     * @param CardModelInterface $defaultSource
     *
     * @return $this
     */
    public function setDefaultSource($defaultSource)
    {
        $this->defaultSource = $defaultSource;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     *
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isDelinquent()
    {
        return $this->delinquent;
    }

    /**
     * @param boolean $delinquent
     *
     * @return $this
     */
    public function setDelinquent($delinquent)
    {
        $this->delinquent = $delinquent;

        return $this;
    }

    /**
     * @return array
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param array $shipping
     *
     * @return $this
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;

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
            ->setCurrency($object['currency'])
            ->setLivemode($object['livemode'])
            ->setCreated(\DateTime::createFromFormat('U', $object['created']))
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
            ->setAccountBalance($object['account_balance'])
            ->setDescription($object['description'])
            ->setEmail($object['email'])
            ->setMetadata($object['metadata'])
            ->setDelinquent($object['delinquent'])
            ->setShipping($object['shipping'] ? $object['shipping']->serializeParameters() : [])
        ;

        return $this;
    }
}
