<?php

namespace Aimir\StripeBundle\Model;

interface StripeUserInterface
{
    /**
     * @return CustomerModelInterface
     */
    public function getStripeCustomer();
}
