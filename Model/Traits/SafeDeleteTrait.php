<?php

namespace Miracode\StripeBundle\Model\Traits;

use Doctrine\ORM\Mapping as ORM;

trait SafeDeleteTrait
{
    /**
     * @ORM\Column(name="deleted", type="boolean")
     *
     * @var bool
     */
    protected $deleted = false;

    /**
     * @return bool
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     *
     * @return $this
     */
    public function setDeleted($deleted = true)
    {
        $this->deleted = $deleted;

        return $this;
    }
}
