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
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function retrieve($stripeId)
    {
        return $this->objectManager->getRepository($this->class)->findOneBy([
            'stripeId' => $stripeId
        ]);
    }

    /**
     * {@inheritdoc}
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

    /**
     * {@inheritdoc}
     */
    public function remove($stripeId, $flush = false)
    {
        if ($model = $this->retrieve($stripeId)) {
            $this->objectManager->remove($model);
            if ($flush) {
                $this->objectManager->flush($model);
            }

            return true;
        }

        return false;
    }
}
