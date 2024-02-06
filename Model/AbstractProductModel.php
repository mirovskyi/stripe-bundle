<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractProductModel extends StripeModel
{

    /**
     * @StripeObjectParam
     */
    protected bool $active;

    /**
     * @StripeObjectParam(name="default_price")
     */
    protected ?string $defaultPrice = null;

    /**
     * @StripeObjectParam
     */
    protected ?string $description = null;

    /**
     * @StripeObjectParam
     */
    protected array $metadata;

    /**
     * @StripeObjectParam
     */
    protected string $name;

    /**
     * @StripeObjectParam
     */
    protected string $object;

    /**
     * @StripeObjectParam
     */
    protected int $created;

    /**
     * @StripeObjectParam
     */
    protected array $features;

    /**
     * @StripeObjectParam
     */
    protected array $images;

    /**
     * @StripeObjectParam
     */
    protected bool $livemode;

    /**
     * @StripeObjectParam(name="package_dimensions")
     */
    protected ?array $packageDimensions = null;

    /**
     * @StripeObjectParam
     */
    protected ?bool $shippable = null;

    /**
     * @StripeObjectParam(name="statement_descriptor")
     */
    protected ?string $statementDescriptor = null;

    /**
     * @StripeObjectParam(name="tax_code")
     */
    protected ?string $taxCode = null;

    /**
     * @StripeObjectParam(name="unit_label")
     */
    protected ?string $unitLabel = null;

    /**
     * @StripeObjectParam
     */
    protected ?int $updated = null;

    /**
     * @StripeObjectParam
     */
    protected ?string $url = null;

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return AbstractProductModel
     */
    public function setActive(bool $active): AbstractProductModel
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDefaultPrice(): ?string
    {
        return $this->defaultPrice;
    }

    /**
     * @param string|null $defaultPrice
     * @return AbstractProductModel
     */
    public function setDefaultPrice(?string $defaultPrice): AbstractProductModel
    {
        $this->defaultPrice = $defaultPrice;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return AbstractProductModel
     */
    public function setDescription(?string $description): AbstractProductModel
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return array
     */
    public function getMetadata(): array
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     * @return AbstractProductModel
     */
    public function setMetadata(array $metadata): AbstractProductModel
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return AbstractProductModel
     */
    public function setName(string $name): AbstractProductModel
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getObject(): string
    {
        return $this->object;
    }

    /**
     * @param string $object
     * @return AbstractProductModel
     */
    public function setObject(string $object): AbstractProductModel
    {
        $this->object = $object;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreated(): int
    {
        return $this->created;
    }

    /**
     * @param int $created
     * @return AbstractProductModel
     */
    public function setCreated(int $created): AbstractProductModel
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return array
     */
    public function getFeatures(): array
    {
        return $this->features;
    }

    /**
     * @param array $features
     * @return AbstractProductModel
     */
    public function setFeatures(array $features): AbstractProductModel
    {
        $this->features = $features;

        return $this;
    }

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param array $images
     * @return AbstractProductModel
     */
    public function setImages(array $images): AbstractProductModel
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @return bool
     */
    public function isLivemode(): bool
    {
        return $this->livemode;
    }

    /**
     * @param bool $livemode
     * @return AbstractProductModel
     */
    public function setLivemode(bool $livemode): AbstractProductModel
    {
        $this->livemode = $livemode;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getPackageDimensions(): ?array
    {
        return $this->packageDimensions;
    }

    /**
     * @param array|null $packageDimensions
     * @return AbstractProductModel
     */
    public function setPackageDimensions(?array $packageDimensions): AbstractProductModel
    {
        $this->packageDimensions = $packageDimensions;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShippable(): ?bool
    {
        return $this->shippable;
    }

    /**
     * @param bool|null $shippable
     * @return AbstractProductModel
     */
    public function setShippable(?bool $shippable): AbstractProductModel
    {
        $this->shippable = $shippable;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatementDescriptor(): ?string
    {
        return $this->statementDescriptor;
    }

    /**
     * @param string|null $statementDescriptor
     * @return AbstractProductModel
     */
    public function setStatementDescriptor(?string $statementDescriptor): AbstractProductModel
    {
        $this->statementDescriptor = $statementDescriptor;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTaxCode(): ?string
    {
        return $this->taxCode;
    }

    /**
     * @param string|null $taxCode
     * @return AbstractProductModel
     */
    public function setTaxCode(?string $taxCode): AbstractProductModel
    {
        $this->taxCode = $taxCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUnitLabel(): ?string
    {
        return $this->unitLabel;
    }

    /**
     * @param string|null $unitLabel
     * @return AbstractProductModel
     */
    public function setUnitLabel(?string $unitLabel): AbstractProductModel
    {
        $this->unitLabel = $unitLabel;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUpdated(): ?int
    {
        return $this->updated;
    }

    /**
     * @param int|null $updated
     * @return AbstractProductModel
     */
    public function setUpdated(?int $updated): AbstractProductModel
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return AbstractProductModel
     */
    public function setUrl(?string $url): AbstractProductModel
    {
        $this->url = $url;

        return $this;
    }

}
