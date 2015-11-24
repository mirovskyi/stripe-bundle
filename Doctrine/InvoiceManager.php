<?php

namespace Aimir\StripeBundle\Doctrine;

use Aimir\StripeBundle\Model\CouponModelInterface;
use Aimir\StripeBundle\Model\InvoiceModelInterface;
use Aimir\StripeBundle\ModelManager\ModelManagerInterface;
use Stripe\StripeObject;

class InvoiceManager extends DoctrineManagerAbstract
{
    /**
     * @var ModelManagerInterface
     */
    protected $couponManager;

    /**
     * @param ModelManagerInterface $couponManager
     */
    public function setCouponManager(ModelManagerInterface $couponManager)
    {
        $this->couponManager = $couponManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(StripeObject $stripeObject, $flush = false)
    {
        /** @var InvoiceModelInterface $invoice */
        $invoice = parent::save($stripeObject);
        if ($stripeObject['discount']) {
            /** @var CouponModelInterface $coupon */
            $coupon = $this->couponManager->save($stripeObject['discount']['coupon'], $flush);
            $invoice->setCoupon($coupon->getStripeId());
        }
        if ($flush) {
            $this->objectManager->flush($invoice);
        }

        return $invoice;
    }
}
