<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractTaxRateModel extends StripeModel
{

    /**
     * @StripeObjectParam
     *
     * @var bool
     */
    protected $active;

    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $created;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $description;

    /**
     * @StripeObjectParam(name="display_name")
     *
     * @var string
     */
    protected $displayName;

    /**
     * @StripeObjectParam
     *
     * @var bool
     */
    protected $inclusive;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $jurisdiction;

    /**
     * @StripeObjectParam
     *
     * @var bool
     */
    protected $livemode;

    /**
     * @StripeObjectParam(embeddedId="id")
     *
     * @var string
     */
    protected $source;

    /**
     * @StripeObjectParam
     *
     * @var array
     */
    protected $metadata;

    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $percentage;

    /**
     * @return int
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param int $created
     *
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return bool
     */
    public function isLivemode()
    {
        return $this->livemode;
    }

    /**
     * @param bool $livemode
     *
     * @return $this
     */
    public function setLivemode($livemode)
    {
        $this->livemode = $livemode;

        return $this;
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     *
     * @return $this
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     *
     * @return $this
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * Set Active.
     *
     * @param bool $active
     *
     * @return AbstractTaxRateModel
     */
    public function setActive(bool $active): AbstractTaxRateModel
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * Set DisplayName.
     *
     * @param string $displayName
     *
     * @return AbstractTaxRateModel
     */
    public function setDisplayName(string $displayName): AbstractTaxRateModel
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * @return bool
     */
    public function isInclusive(): bool
    {
        return $this->inclusive;
    }

    /**
     * Set Inclusive.
     *
     * @param bool $inclusive
     *
     * @return AbstractTaxRateModel
     */
    public function setInclusive(bool $inclusive): AbstractTaxRateModel
    {
        $this->inclusive = $inclusive;

        return $this;
    }

    /**
     * @return string
     */
    public function getJurisdiction(): string
    {
        return $this->jurisdiction;
    }

    /**
     * Set Jurisdiction.
     *
     * @param string $jurisdiction
     *
     * @return AbstractTaxRateModel
     */
    public function setJurisdiction(string $jurisdiction): AbstractTaxRateModel
    {
        $this->jurisdiction = $jurisdiction;

        return $this;
    }

    /**
     * @return int
     */
    public function getPercentage(): int
    {
        return $this->percentage;
    }

    /**
     * Set Percentage.
     *
     * @param int $percentage
     *
     * @return AbstractTaxRateModel
     */
    public function setPercentage(int $percentage): AbstractTaxRateModel
    {
        $this->percentage = $percentage;

        return $this;
    }

}
