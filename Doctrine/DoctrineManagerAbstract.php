<?php

namespace Aimir\StripeBundle\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
use Aimir\StripeBundle\Model\StripeModelInterface;
use Aimir\StripeBundle\ModelManager\ModelManagerInterface;
use Stripe\StripeObject;

abstract class DoctrineManagerAbstract implements ModelManagerInterface
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var string
     */
    protected $class;

    /**
     * @param ObjectManager $objectManager
     * @param string $class
     */
    public function __construct(ObjectManager $objectManager, $class)
    {
        $this->objectManager = $objectManager;
        $this->class = $class;
    }

    /**
     * Create model object
     *
     * @return StripeModelInterface
     * @throws \Exception
     */
    public function create()
    {
        $reflection = new \ReflectionClass($this->class);
        if (!$reflection->implementsInterface('StripeModelInterface')) {
            throw new \Exception(sprintf('Class %s must implement StripeModelInterface', $this->class));
        }
        $class = $this->class;

        return new $class();
    }

    /**
     * @param string $stripeId
     *
     * @return StripeModelInterface
     */
    public function retrieve($stripeId)
    {
        return $this->objectManager->getRepository($this->class)->findOneBy([
            'stripeId' => $stripeId
        ]);
    }

    /**
     * Create|Update stripe model from stripe object
     *
     * @param StripeObject $stripeObject
     * @param bool $flush Flush data to storage
     *
     * @return StripeModelInterface
     * @throws \Exception
     */
    public function save(StripeObject $stripeObject, $flush = false)
    {
        if (!$model = $this->retrieve($stripeObject['id'])) {
            $model = $this
                ->create()
                ->initFromStripeObject($stripeObject)
            ;
            $this->objectManager->persist($model);
        } else {
            $model->updateFromStripeObject($stripeObject);
        }
        if ($flush) {
            $this->objectManager->flush($model);
        }

        return $model;
    }
}