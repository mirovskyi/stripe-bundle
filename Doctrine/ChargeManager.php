<?php

namespace Aimir\StripeBundle\Doctrine;

use Aimir\StripeBundle\Model\CardModelInterface;
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
    public function save(StripeObject $stripeObject, $flush = false)
    {
        /** @var ChargeModelInterface $charge */
        $charge = parent::save($stripeObject);
        if ($stripeObject['source']) {
            /** @var CardModelInterface $card */
            $card = $this->cardManager->save($stripeObject['source'], $flush);
            $charge->setSource($card->getStripeId());
        }
        if ($flush) {
            $this->objectManager->flush($charge);
        }

        return $charge;
    }
}
