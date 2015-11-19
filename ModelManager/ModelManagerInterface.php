<?php

namespace Aimir\StripeBundle\ModelManager;

use Aimir\StripeBundle\Model\StripeModelInterface;
use Stripe\StripeObject;

interface ModelManagerInterface
{
    /**
     * Create new model object
     *
     * @return StripeModelInterface
     */
    public function create();

    /**
     * @param string $stripeId
     *
     * @return StripeModelInterface
     */
    public function retrieve($stripeId);

    /**
     * Create|Update stripe model from stripe object
     *
     * @param StripeObject $stripeObject
     *
     * @return StripeModelInterface
     */
    public function save(StripeObject $stripeObject);
}
