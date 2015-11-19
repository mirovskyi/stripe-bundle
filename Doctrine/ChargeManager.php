<?php

namespace Aimir\StripeBundle\Doctrine;

use Aimir\StripeBundle\Model\ChargeModelInterface;
use Aimir\StripeBundle\ModelManager\ModelManagerInterface;
use Stripe\StripeObject;

class ChargeManager extends DoctrineManagerAbstract
{
    /**
     * @var ModelManagerInterface
     */
    protected $cardManager;

    /**
     * @param ModelManagerInterface $cardManager
     */
    public function setCardManager(ModelManagerInterface $cardManager)
    {
        $this->cardManager = $cardManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(StripeObject $stripeObject)
    {
        $model = parent::save($stripeObject);
        if ($stripeObject['source']) {
            $this->cardManager->save($stripeObject['source']);
        }

        return $model;
    }
}
