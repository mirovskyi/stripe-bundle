<?php

namespace Miracode\StripeBundle\Manager\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
use Miracode\StripeBundle\Manager\ModelManagerInterface;
use Miracode\StripeBundle\Model\SafeDeleteModelInterface;
use Miracode\StripeBundle\Model\StripeModelInterface;
use Miracode\StripeBundle\StripeException;
use Miracode\StripeBundle\Transformer\TransformerInterface;
use Stripe\StripeObject;

class DoctrineORMModelManager implements ModelManagerInterface
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var TransformerInterface
     */
    protected $modelTransformer;

    /**
     * @var array
     */
    protected $modelClasses;

    /**
     * DoctrineORMModelManager constructor.
     * @param ObjectManager $objectManager
     * @param TransformerInterface $transformer
     * @param array $modelClasses
     */
    public function __construct(
        ObjectManager $objectManager,
        TransformerInterface $transformer,
        $modelClasses
    ) {
        $this->objectManager = $objectManager;
        $this->modelTransformer = $transformer;
        $this->modelClasses = $modelClasses;
    }

    /**
     * Is stripe object supported by model manager
     *
     * @param StripeObject $object
     *
     * @return bool
     */
    public function support(StripeObject $object)
    {
        return isset($this->modelClasses[$object->object]);
    }

    /**
     * Retrieve model by stripe object data
     *
     * @param StripeObject $object
     *
     * @return StripeModelInterface|object|null
     */
    public function retrieve(StripeObject $object)
    {
        $this->checkSupport($object);
        $modelClass = $this->modelClass($object);

        return $this->objectManager->getRepository($modelClass)->findOneBy([
            'stripeId' => $object->id
        ]);
    }

    /**
     * Save stripe object in database
     *
     * @param StripeObject $object
     * @param bool $flush
     *
     * @return StripeModelInterface
     */
    public function save(StripeObject $object, $flush = FALSE)
    {
        $model = $this->retrieve($object);
        if (!$model) {
            $model = $this->createModel($object);
            $this->objectManager->persist($model);
        }
        $this->modelTransformer->transform($object, $model);
        if ($flush) {
            $this->objectManager->flush();
        }

        return $model;
    }

    /**
     * Remove model from database by stripe object data
     * Return model object that was removed or NULL if model does not exists
     *
     * @param StripeObject $object
     * @param bool $flush
     *
     * @return StripeModelInterface|null
     */
    public function remove(StripeObject $object, $flush = FALSE)
    {
        $model = $this->retrieve($object);
        if (!$model) {
            return null;
        }
        if ($model instanceof SafeDeleteModelInterface) {
            $model->setDeleted(true);
        } else {
            $this->objectManager->remove($model);
        }
        if ($flush) {
            $this->objectManager->flush();
        }

        return $model;
    }

    /**
     * Check object support
     *
     * @param \Stripe\StripeObject $object
     *
     * @throws \Miracode\StripeBundle\StripeException
     */
    protected function checkSupport(StripeObject $object)
    {
        if (!$this->support($object)) {
            throw new StripeException(sprintf(
                'Stripe object `%1$s` does not support. '
                . 'Please specify model class for object type `%1$s` '
                . 'in miracode_stripe.database.model.%1$s',
                $object->object
            ));
        }
    }

    /**
     * Get model class name for specified stripe object
     *
     * @param StripeObject $object
     *
     * @return string
     */
    protected function modelClass(StripeObject $object)
    {
        return $this->modelClasses[$object->object];
    }

    /**
     * Create new model object
     *
     * @param StripeObject $object
     *
     * @return StripeModelInterface
     */
    protected function createModel(StripeObject $object)
    {
        $className = $this->modelClass($object);

        return new $className();
    }
}
