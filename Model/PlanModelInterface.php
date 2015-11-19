<?php

namespace Aimir\StripeBundle\Model;

interface PlanModelInterface extends StripeModelInterface
{
    /**
     * @return int
     */
    public function getAmount();

    /**
     * @return \DateTime
     */
    public function getCreated();

    /**
     * @return string
     */
    public function getCurrency();

    /**
     * @return string
     */
    public function getInterval();

    /**
     * @return int
     */
    public function getIntervalCount();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getStatementDescriptor();

    /**
     * @return int
     */
    public function getTrialPeriodDays();
}