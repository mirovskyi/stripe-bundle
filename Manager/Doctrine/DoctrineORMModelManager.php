<?php

namespace Miracode\StripeBundle\Manager\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
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
     *
     * @param array $modelClasses
     */
    public function __construct(
        EntityManagerInterface $objectManager,
        TransformerInterface $transformer,
        $modelClasses
    ) {
        $this->objectManager = $objectManager;
        $this->modelTransformer = $transformer;
        $this->modelClasses = $modelClasses;
    }

    /**
     * Is stripe object supported by model manager.
     *
     * @return bool
     */
    public function support(StripeObject $object)
    {
        return isset($this->modelClasses[$this->getObjectType($object)]);
    }

    /**
     * Retrieve model by stripe object data.
     *
     * @return StripeModelInterface|object|null
     */
    public function retrieve(StripeObject $object)
    {
        $this->checkSupport($object);
        $modelClass = $this->modelClass($object);

        return $this->objectManager->getRepository($modelClass)->findOneBy([
            'id' => $object->id,
        ]);
    }

    /**
     * Retrieve model by stripe ID and stripe object type.
     *
     * @param string $id
     * @param string $objectType
     *
     * @return StripeModelInterface|null
     */
    public function retrieveById($id, $objectType)
    {
        $stripeObject = new StripeObject($id);
        $stripeObject->object = $objectType;

        return $this->retrieve($stripeObject);
    }

    /**
     * Save stripe object in database.
     *
     * @param bool $flush
     *
     * @return StripeModelInterface
     */
    public function save(StripeObject $object, $flush = false)
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
     * Return model object that was removed or NULL if model does not exists.
     *
     * @param bool $flush
     *
     * @return StripeModelInterface|null
     */
    public function remove(StripeObject $object, $flush = false)
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
     * Get stripe object type.
     *
     * @return string
     *
     * @throws StripeException
     */
    protected function getObjectType(StripeObject $object)
    {
        if (empty($object->object)) {
            if (isset($object->deleted) && isset($object->id)) {
                throw new StripeException(sprintf('Couldn\'t detect stripe object type. Stripe object with ID `%s` has been already deleted.', $object->id));
            }
            throw new StripeException('Couldn\'t detect stripe object type.');
        }

        return $object->object;
    }

    /**
     * Check object support.
     *
     * @throws \Miracode\StripeBundle\StripeException
     */
    protected function checkSupport(StripeObject $object)
    {
        if (!$this->support($object)) {
            throw new StripeException(sprintf('Stripe object `%1$s` does not support. Please specify model class for object type `%1$s` in miracode_stripe.database.model.%1$s', $this->getObjectType($object)));
        }
    }

    /**
     * Get model class name for specified stripe object.
     *
     * @return string
     */
    protected function modelClass(StripeObject $object)
    {
        return $this->modelClasses[$this->getObjectType($object)];
    }

    /**
     * Create new model object.
     *
     * @return StripeModelInterface
     */
    protected function createModel(StripeObject $object)
    {
        $className = $this->modelClass($object);
        $class = new $className();

        if ($object->id) {
            $class->setId($object->id);
        }

        return $class;
    }
}
