<?php

namespace Aimir\StripeBundle\Doctrine;

use Doctrine\Common\Collections\ArrayCollection;
use Aimir\StripeBundle\Model\CardModelInterface;
use Aimir\StripeBundle\Model\CustomerModelInterface;
use Aimir\StripeBundle\Model\SubscriptionModelInterface;
use Stripe\StripeObject;

class CustomerManager extends DoctrineManagerAbstract
{
    /**
     * @var CardManager
     */
    protected $cardManager;

    /**
     * @var SubscriptionManager
     */
    protected $subscriptionManager;

    /**
     * @param CardManager $cardManager
     */
    public function setCardManager(CardManager $cardManager)
    {
        $this->cardManager = $cardManager;
    }

    /**
     * @param SubscriptionManager $subscriptionManager
     */
    public function setSubscriptionManager(SubscriptionManager $subscriptionManager)
    {
        $this->subscriptionManager = $subscriptionManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(StripeObject $stripeObject)
    {
        $model = parent::save($stripeObject);
        if ($stripeObject['source']) {
            $this->cardManager->save($stripeObject['source']);
        }
        if ($stripeObject['subscription']) {
            $this->subscriptionManager->save($stripeObject['subscription']);
        }

        return $model;
    }
}
