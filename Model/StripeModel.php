<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

class StripeModel implements StripeModelInterface
{
    /**
     * @StripeObjectParam(name="id")
     *
     * @var string
     */
    protected $stripeId;

    /**
     * Retrieve stripe object ID
     *
     * @return string
     */
    public function getStripeId()
    {
        return $this->stripeId;
    }

    /**
     * @param string $stripeId
     *
     * @return $this
     */
    public function setStripeId($stripeId)
    {
        $this->stripeId = $stripeId;

        return $this;
    }
}
