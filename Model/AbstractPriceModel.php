<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractPriceModel extends StripeModel
{
    /**
     * @StripeObjectParam
     */
    protected bool $active;

    /**
     * @StripeObjectParam
     */
    protected string $currency;

    /**
     * @StripeObjectParam
     */
    protected array $metadata = [];

    /**
     * @StripeObjectParam(name="nickname")
     *
     * @var ?string
     */
    protected ?string $nickname = null;

    /**
     * @StripeObjectParam
     */
    protected string $product;

    /**
     * @StripeObjectParam
     *
     * @var ?array
     */
    protected ?array $recurring = null;

    /**
     * @StripeObjectParam
     */
    protected string $type;

    /**
     * @StripeObjectParam(name="unit_amount")
     *
     * @var ?int
     */
    protected ?int $unitAmount = null;

    /**
     * @StripeObjectParam
     */
    protected string $object;

    /**
     * @StripeObjectParam(name="billing_scheme")
     */
    protected string $billingScheme;

    /**
     * @StripeObjectParam
     */
    protected int $created;

    /**
     * @StripeObjectParam(name="currency_options")
     *
     * @var ?array
     */
    protected ?array $currencyOptions = null;

    /**
     * @StripeObjectParam(name="custom_unit_amount")
     *
     * @var ?array
     */
    protected ?array $customUnitAmount = null;

    /**
     * @StripeObjectParam
     */
    protected bool $livemode;

    /**
     * @StripeObjectParam(name="lookup_key")
     *
     * @var ?string
     */
    protected ?string $lookupKey = null;

    /**
     * @StripeObjectParam(name="tax_behaviour")
     *
     * @var ?string
     */
    protected ?string $taxBehaviour = null;

    /**
     * @StripeObjectParam
     *
     * @var ?array
     */
    protected ?array $tiers = null;

    /**
     * @StripeObjectParam(name="tiers_mode")
     *
     * @var ?string
     */
    protected ?string $tiersMode = null;

    /**
     * @StripeObjectParam(name="transform_quality")
     *
     * @var ?array
     */
    protected ?array $transformQuality = null;

    /**
     * @StripeObjectParam(name="unit_amount_decimal")
     *
     * @var ?string
     */
    protected ?string $unitAmountDecimal = null;

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return AbstractPriceModel
     */
    public function setActive(bool $active): AbstractPriceModel
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return AbstractPriceModel
     */
    public function setCurrency(string $currency): AbstractPriceModel
    {
        $this->currency = $currency;

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
     * @return AbstractPriceModel
     */
    public function setMetadata(array $metadata): AbstractPriceModel
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    /**
     * @param string|null $nickname
     * @return AbstractPriceModel
     */
    public function setNickname(?string $nickname): AbstractPriceModel
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * @return string
     */
    public function getProduct(): string
    {
        return $this->product;
    }

    /**
     * @param string $product
     * @return AbstractPriceModel
     */
    public function setProduct(string $product): AbstractPriceModel
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getRecurring(): ?array
    {
        return $this->recurring;
    }

    /**
     * @param array|null $recurring
     * @return AbstractPriceModel
     */
    public function setRecurring(?array $recurring): AbstractPriceModel
    {
        $this->recurring = $recurring;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return AbstractPriceModel
     */
    public function setType(string $type): AbstractPriceModel
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUnitAmount(): ?int
    {
        return $this->unitAmount;
    }

    /**
     * @param int|null $unitAmount
     * @return AbstractPriceModel
     */
    public function setUnitAmount(?int $unitAmount): AbstractPriceModel
    {
        $this->unitAmount = $unitAmount;

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
     * @return AbstractPriceModel
     */
    public function setObject(string $object): AbstractPriceModel
    {
        $this->object = $object;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillingScheme(): string
    {
        return $this->billingScheme;
    }

    /**
     * @param string $billingScheme
     * @return AbstractPriceModel
     */
    public function setBillingScheme(string $billingScheme): AbstractPriceModel
    {
        $this->billingScheme = $billingScheme;

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
     * @return AbstractPriceModel
     */
    public function setCreated(int $created): AbstractPriceModel
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getCurrencyOptions(): ?array
    {
        return $this->currencyOptions;
    }

    /**
     * @param array|null $currencyOptions
     * @return AbstractPriceModel
     */
    public function setCurrencyOptions(?array $currencyOptions): AbstractPriceModel
    {
        $this->currencyOptions = $currencyOptions;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getCustomUnitAmount(): ?array
    {
        return $this->customUnitAmount;
    }

    /**
     * @param array|null $customUnitAmount
     * @return AbstractPriceModel
     */
    public function setCustomUnitAmount(?array $customUnitAmount): AbstractPriceModel
    {
        $this->customUnitAmount = $customUnitAmount;

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
     * @return AbstractPriceModel
     */
    public function setLivemode(bool $livemode): AbstractPriceModel
    {
        $this->livemode = $livemode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLookupKey(): ?string
    {
        return $this->lookupKey;
    }

    /**
     * @param string|null $lookupKey
     * @return AbstractPriceModel
     */
    public function setLookupKey(?string $lookupKey): AbstractPriceModel
    {
        $this->lookupKey = $lookupKey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTaxBehaviour(): ?string
    {
        return $this->taxBehaviour;
    }

    /**
     * @param string|null $taxBehaviour
     * @return AbstractPriceModel
     */
    public function setTaxBehaviour(?string $taxBehaviour): AbstractPriceModel
    {
        $this->taxBehaviour = $taxBehaviour;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getTiers(): ?array
    {
        return $this->tiers;
    }

    /**
     * @param array|null $tiers
     * @return AbstractPriceModel
     */
    public function setTiers(?array $tiers): AbstractPriceModel
    {
        $this->tiers = $tiers;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTiersMode(): ?string
    {
        return $this->tiersMode;
    }

    /**
     * @param string|null $tiersMode
     * @return AbstractPriceModel
     */
    public function setTiersMode(?string $tiersMode): AbstractPriceModel
    {
        $this->tiersMode = $tiersMode;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getTransformQuality(): ?array
    {
        return $this->transformQuality;
    }

    /**
     * @param array|null $transformQuality
     * @return AbstractPriceModel
     */
    public function setTransformQuality(?array $transformQuality): AbstractPriceModel
    {
        $this->transformQuality = $transformQuality;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUnitAmountDecimal(): ?string
    {
        return $this->unitAmountDecimal;
    }

    /**
     * @param string|null $unitAmountDecimal
     * @return AbstractPriceModel
     */
    public function setUnitAmountDecimal(?string $unitAmountDecimal): AbstractPriceModel
    {
        $this->unitAmountDecimal = $unitAmountDecimal;

        return $this;
    }
}
