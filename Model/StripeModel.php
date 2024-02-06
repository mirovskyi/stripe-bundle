<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

class StripeModel implements StripeModelInterface
{
    /**
     * @StripeObjectParam(name="id")
     */
    protected string $id;

    /**
     * Retrieve stripe object ID.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return $this
     */
    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }
}
