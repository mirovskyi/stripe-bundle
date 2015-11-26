<?php

namespace Aimir\StripeBundle\EventListener;

use Aimir\StripeBundle\Event\StripeEventType;
use Aimir\StripeBundle\ModelManager\ModelManagerInterface;
use Aimir\StripeBundle\Stripe\StripeInvoice;
use Aimir\StripeBundle\StripeException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class InvoiceEventListener implements EventSubscriberInterface
{
    /**
     * @var ModelManagerInterface
     */
    protected $invoiceManager;

    /**
     * InvoiceEventListener constructor.
     *
     * @param ModelManagerInterface $invoiceManager
     */
    public function __construct(ModelManagerInterface $invoiceManager)
    {
        $this->invoiceManager = $invoiceManager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            StripeEventType::INVOICE_CREATED => 'onInvoiceEvent',
            StripeEventType::INVOICE_UPDATED => 'onInvoiceEvent',
            StripeEventType::INVOICE_PAYMENT_SUCCEEDED => 'onInvoiceEvent',
            StripeEventType::INVOICE_PAYMENT_FAILED => 'onInvoiceEvent'
        ];
    }

    /**
     * Handle invoice events
     *
     * @param StripeEventType $event
     * @throws StripeException
     */
    public function onInvoiceEvent(StripeEventType $event)
    {
        $stripeInvoice = $event->getEvent()['data']['object'];
        if ($stripeInvoice['object'] != StripeInvoice::STRIPE_OBJECT) {
            throw new StripeException(sprintf(
                'Invalid object type "%s". Expected type is "%s".',
                $stripeInvoice['object'],
                StripeInvoice::STRIPE_OBJECT
            ));
        }
        $this->invoiceManager->save($stripeInvoice, true);
    }
}
