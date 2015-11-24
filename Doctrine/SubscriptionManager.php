<?php

namespace Aimir\StripeBundle\Doctrine;

use Aimir\StripeBundle\Model\CouponModelInterface;
use Aimir\StripeBundle\Model\PlanModelInterface;
use Aimir\StripeBundle\Model\SubscriptionModelInterface;
use Aimir\StripeBundle\ModelManager\ModelManagerInterface;
use Stripe\StripeObject;

class SubscriptionManager extends DoctrineManagerAbstract
{
    /**
     * @var ModelManagerInterface
     */
    protected $planManager;

    /**
     * @var ModelManagerInterface
     */
    protected $couponManager;

    public function setPlanManager(ModelManagerInterface $planManager)
    {
        $this->planManager = $planManager;
    }

    /**
     * @param ModelManagerInterface $couponManager
     */
    public function setCouponManager(ModelManagerInterface $couponManager)
    {
        $this->couponManager = $couponManager;
    }

    public function save(StripeObject $stripeObject, $flush = false)
    {
        /** @var SubscriptionModelInterface $subscription */
        $subscription = parent::save($stripeObject);
        if ($stripeObject['discount']) {
            /** @var CouponModelInterface $coupon */
            $coupon = $this->couponManager->save($stripeObject['discount']['coupon'], $flush);
            $subscription->setCoupon($coupon->getStripeId());
        }
        if ($stripeObject['plan']) {
            /** @var PlanModelInterface $plan */
            $plan = $this->planManager->save($stripeObject['plan'], $flush);
            $subscription->setPlan($plan->getStripeId());
        }
        if ($flush) {
            $this->objectManager->flush($subscription);
        }
    }
}
