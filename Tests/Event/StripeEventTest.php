<?php

namespace Miracode\StripeBundle\Tests\Event;

use Miracode\StripeBundle\Event\StripeEvent;
use Stripe\StripeObject;

class StripeEventTest extends \PHPUnit_Framework_TestCase
{
    public function testEvent()
    {
        $event = new StripeEvent(new StripeObject('test_id'));
        $this->assertEquals('test_id', $event->getEvent()->id);
    }

    public function testEventObjectData()
    {
        $object = new StripeObject();
        $object->data = new StripeObject();
        $object->data->object = new StripeObject('test_id');
        $event = new StripeEvent($object);

        $this->assertEquals('test_id', $event->getDataObject()->id);
    }

    /**
     * @expectedException Miracode\StripeBundle\StripeException
     */
    public function testEventEmptyObject()
    {
        $event = new StripeEvent(new StripeObject());
        $event->getDataObject();
    }
}
