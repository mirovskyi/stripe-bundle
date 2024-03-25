<?php

namespace Miracode\StripeBundle\Tests\Event;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\StripeException;
use PHPUnit\Framework\TestCase;
use Stripe\StripeObject;

class StripeEventTest extends TestCase
{
    final public function testEvent(): void
    {
        $event = new StripeEvent(new StripeObject('test_id'));
        $this->assertEquals('test_id', $event->getEvent()->id);
    }

    final public function testEventObjectData(): void
    {
        $object = new StripeObject();
        $object->data = new StripeObject();
        $object->data->object = new StripeObject('test_id');
        $event = new StripeEvent($object);

        $this->assertEquals('test_id', $event->getDataObject()->id);
    }

    final public function testEventEmptyObject(): void
    {
        $object = new StripeObject('id1');
        $event = new StripeEvent($object);
        $this->expectException(StripeException::class);
        $event->getDataObject();
    }
}
