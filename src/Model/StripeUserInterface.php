<?php

namespace Miracode\StripeBundle\Model;

interface StripeUserInterface
{
    /**
     * @return StripeModelInterface
     */
    public function getStripeCustomer();
}
