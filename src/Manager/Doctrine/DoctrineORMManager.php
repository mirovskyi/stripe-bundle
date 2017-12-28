<?php

namespace Miracode\StripeBundle\Manager\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
use Miracode\StripeBundle\Manager\ManagerInterface;
use Stripe\StripeObject;

class DoctrineORMManager implements ManagerInterface
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
        $interface = 'Miracode\\StripeBundle\\Model\\StripeModelInterface';
        if (!$reflection->implementsInterface($interface)) {
            throw new \Exception(sprintf(
                'Class %s must implement StripeModelInterface',
                $this->class
            ));
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
            $model = $this->create();
            $this->objectManager->persist($model);
        }
        $model->updateFromStripeObject($stripeObject);
        if ($flush) {
            $this->objectManager->flush();
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
                $this->objectManager->flush();
            }

            return true;
        }

        return false;
    }
}
