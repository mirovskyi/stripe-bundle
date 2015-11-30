<?php

namespace Aimir\StripeBundle\Model;

use Stripe\Object as StripeObject;

abstract class PlanModel extends StripeModelAbstract implements PlanModelInterface
{
    /**
     * @var int
     */
    protected $amount;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $interval;

    /**
     * @var int
     */
    protected $intervalCount;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $statementDescriptor;

    /**
     * @var int
     */
    protected $trialPeriodDays;

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
     * Initialize model object from stripe data
     *
     * @param StripeObject $object
     *
     * @return $this
     */
    public function initFromStripeObject(StripeObject $object)
    {
        $this
            ->setStripeId($object['id'])
            ->setCreated(\DateTime::createFromFormat('U', $object['created']))
            ->setAmount($object['amount'])
            ->setCurrency($object['currency'])
            ->setInterval($object['interval'])
            ->setIntervalCount($object['interval_count'])
            ->setTrialPeriodDays($object['trial_period_days'])
            ->setLivemode($object['livemode'])
            ->updateFromStripeObject($object)
        ;

        return $this;
    }

    /**
     * Update model object from stripe data
     *
     * @param StripeObject $object
     *
     * @return $this
     */
    public function updateFromStripeObject(StripeObject $object)
    {
        $this
            ->setName($object['name'])
            ->setMetadata($object['metadata']->__toArray())
            ->setStatementDescriptor($object['statement_descriptor'])
        ;

        return $this;
}}
