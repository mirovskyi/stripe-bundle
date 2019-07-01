<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractProductModel extends StripeModel
{
    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $object;

    /**
     * @StripeObjectParam
     *
     * @var boolean
     */
    protected $active;

    /**
     * @StripeObjectParam
     *
     * @var array
     */
    protected $attributes;

    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $created;

    /**
     * @StripeObjectParam
     *
     * @var array
     */
    protected $deactivateOn;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $description;

    /**
     * @StripeObjectParam
     *
     * @var array
     */
    protected $images;

    /**
     * @StripeObjectParam
     *
     * @var boolean
     */
    protected $livemode;

    /**
     * @StripeObjectParam
     *
     * @var array
     */
    protected $metadata;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $name;

    /**
     * @StripeObjectParam
     *
     * @var array
     */
    protected $packageDimensions;

    /**
     * @StripeObjectParam
     *
     * @var boolean
     */
    protected $shippable;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $statementDescriptor;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $type;

    /**
     * @StripeObjectParam
     *
     * @var int
     */
    protected $updated;

    /**
     * @StripeObjectParam
     *
     * @var string
     */
    protected $url;

    /**
     * @return string
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param string $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return int
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param int $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return array
     */
    public function getDeactivateOn()
    {
        return $this->deactivateOn;
    }

    /**
     * @param array $deactivateOn
     */
    public function setDeactivateOn($deactivateOn)
    {
        $this->deactivateOn = $deactivateOn;
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
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param array $images
     */
    public function setImages($images)
    {
        $this->images = $images;
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
     */
    public function setLivemode($livemode)
    {
        $this->livemode = $livemode;
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
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getPackageDimensions()
    {
        return $this->packageDimensions;
    }

    /**
     * @param array $packageDimensions
     */
    public function setPackageDimensions($packageDimensions)
    {
        $this->packageDimensions = $packageDimensions;
    }

    /**
     * @return bool
     */
    public function isShippable()
    {
        return $this->shippable;
    }

    /**
     * @param bool $shippable
     */
    public function setShippable($shippable)
    {
        $this->shippable = $shippable;
    }

    /**
     * @return string
     */
    public function getStatementDescriptor()
    {
        return $this->statementDescriptor;
    }

    /**
     * @param string $statementDescriptor
     */
    public function setStatementDescriptor($statementDescriptor)
    {
        $this->statementDescriptor = $statementDescriptor;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param int $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }


}
