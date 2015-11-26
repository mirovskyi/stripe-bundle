<?php

namespace Aimir\StripeBundle\Stripe\Model;

class Plan
{
    const INTERVAL_DAY = 'day';
    const INTERVAL_WEEK = 'week';
    const INTERVAL_MONTH = 'month';
    const INTERVAL_YEAR = 'year';

    /**
     * @var string
     */
    protected $id;

    /**
     * @var int
     */
    protected $amount;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $interval;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $intervalCount;

    /**
     * @var int
     */
    protected $trialPeriodDays;

    /**
     * @var string
     */
    protected $statementDescriptor;

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

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
     * @return string
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @param string $interval
     *
     * @return $this
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;

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
     * @return int
     */
    public function getIntervalCount()
    {
        return $this->intervalCount;
    }

    /**
     * @param int $intervalCount
     *
     * @return $this
     */
    public function setIntervalCount($intervalCount)
    {
        $this->intervalCount = $intervalCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getTrialPeriodDays()
    {
        return $this->trialPeriodDays;
    }

    /**
     * @param int $trialPeriodDays
     *
     * @return $this
     */
    public function setTrialPeriodDays($trialPeriodDays)
    {
        $this->trialPeriodDays = $trialPeriodDays;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatementDescriptor()
    {
        return $this->statementDescriptor;
    }

    /**
     * @param string $statementDescriptor
     *
     * @return $this
     */
    public function setStatementDescriptor($statementDescriptor)
    {
        $this->statementDescriptor = $statementDescriptor;

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
     * Convert to array in stripe format
     *
     * @see https://stripe.com/docs/api#create_plan
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'amount' => $this->getAmount(),
            'currency' => $this->getCurrency(),
            'interval' => $this->getInterval(),
            'name' => $this->getName(),
            'interval_count' => $this->getIntervalCount(),
            'trial_period_days' => $this->getTrialPeriodDays(),
            'statement_descriptor' => $this->getStatementDescriptor(),
            'metadata' => $this->getMetadata()
        );
    }
}
