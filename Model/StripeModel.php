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
    protected $id;

    /**
     * Retrieve stripe object ID
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
