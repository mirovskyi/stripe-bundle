<?php

namespace Miracode\StripeBundle\Manager;

use Miracode\StripeBundle\Model\StripeModelInterface;
use Stripe\StripeObject;

interface ModelManagerInterface
{
    /**
     * Is stripe object supported by model manager
     *
     * @param StripeObject $object
     *
     * @return bool
     */
    public function support(StripeObject $object);

    /**
     * Retrieve model by stripe object data
     *
     * @param StripeObject $object
     *
     * @return StripeModelInterface|null
     */
    public function retrieve(StripeObject $object);

    /**
     * Retrieve model by stripe ID and stripe object type
     *
     * @param string $id
     * @param string $objectType
     * @return StripeModelInterface|null
     */
    public function retrieveByStripeId($id, $objectType);

    /**
     * Save stripe object in database
     *
     * @param StripeObject $object
     * @param bool $flush
     *
     * @return StripeModelInterface
     */
    public function save(StripeObject $object, $flush = false);

    /**
     * Remove model from database by stripe object data
     * Return model object that was removed or NULL if model does not exists
     *
     * @param StripeObject $object
     * @param bool $flush
     *
     * @return \Miracode\StripeBundle\Model\StripeModelInterface|null
     */
    public function remove(StripeObject $object, $flush = false);
}
