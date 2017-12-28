<?php

namespace Miracode\StripeBundle\EventListener;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Manager\ManagerInterface;
use Miracode\StripeBundle\Stripe\StripeObjectType;
use Miracode\StripeBundle\StripeException;

class InvoiceEventSubscriber extends AbstractEventSubscriber
{
    /**
     * @var ManagerInterface
     */
    protected $invoiceManager;

    /**
     * InvoiceEventListener constructor.
     *
     * @param ManagerInterface $invoiceManager
     */
    public function __construct(ManagerInterface $invoiceManager)
    {
        $this->invoiceManager = $invoiceManager;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            StripeEvent::INVOICE_CREATED => 'onInvoiceEvent',
            StripeEvent::INVOICE_PAYMENT_SUCCEEDED => 'onInvoiceEvent',
            StripeEvent::INVOICE_PAYMENT_FAILED => 'onInvoiceEvent',
            StripeEvent::INVOICE_SENT => 'onInvoiceEvent',
            StripeEvent::INVOICE_UPCOMING => 'onInvoiceEvent',
            StripeEvent::INVOICE_UPDATED => 'onInvoiceEvent',
        ];
    }

    /**
     * Handle invoice events
     *
     * @param StripeEvent $event
     * @throws StripeException
     */
    public function onInvoiceEvent(StripeEvent $event)
    {
        $this->checkObjectType($event, StripeObjectType::INVOICE);
        $this->invoiceManager->save($event->getDataObject(), true);
    }
}
