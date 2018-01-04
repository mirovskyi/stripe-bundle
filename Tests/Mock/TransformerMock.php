<?php

namespace Miracode\StripeBundle\Tests\Mock;

use Miracode\StripeBundle\Model\StripeModelInterface;
use Miracode\StripeBundle\Transformer\TransformerInterface;
use Stripe\StripeObject;

class TransformerMock implements TransformerInterface
{
    /**
     * Transform stripe object into model
     *
     * @param StripeObject $stripeObject
     * @param StripeModelInterface $model
     *
     * @return void
     */
    public function transform(
        StripeObject $stripeObject,
        StripeModelInterface $model
    )
    {
        // TODO: Implement transform() method.
    }
}
