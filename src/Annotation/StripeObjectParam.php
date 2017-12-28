<?php

namespace Miracode\StripeBundle\Annotation;

/**
 * @Annotation
 */
class StripeObjectParam
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $embeddedId;
}
