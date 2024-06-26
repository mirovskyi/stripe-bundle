<?php

namespace Miracode\StripeBundle\Tests\Event;

use Miracode\StripeBundle\Controller\WebhookController;
use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Stripe\StripeObjectType;
use PHPUnit\Framework\TestCase;
use Stripe\StripeObject;

class WebhookControllerTest extends TestCase
{
    /**
     * @expectedException Symfony\Component\HttpKernel\Exception\BadRequestHttpException
     */
    public function testEventEmptyObject()
    {
        $container = $this->createMock("Symfony\Component\DependencyInjection\ContainerInterface");
        $request = $this->createMock("Symfony\Component\HttpFoundation\Request");

        $controller = new WebhookController();
        $controller->setContainer($container);

        $controller->handleAction($request);
    }

    /**
     * @expectedException  Stripe\Error\Authentication
     */
    public function testWebhookReceived()
    {
        $container = $this->createMock("Symfony\Component\DependencyInjection\ContainerInterface");
        $request = $this->createMock("Symfony\Component\HttpFoundation\Request");

        $request->method('getContent')->willReturn('{
                     "created": 1326853478,
                     "livemode": false,
                     "id": "evt_00000000000000",
                     "type": "plan.updated",
                     "object": "event",
                     "request": null,
                     "pending_webhooks": 1,
                     "api_version": "2018-02-28",
                     "data": {
                       "object": {
                         "id": "plan_00000000000000",
                         "object": "plan",
                         "active": true,
                         "aggregate_usage": null,
                         "amount": 1000,
                         "billing_scheme": "per_unit",
                         "created": 1531474043,
                         "currency": "eur",
                         "interval": "month",
                         "interval_count": 1,
                         "livemode": false,
                         "metadata": {
                         },
                         "nickname": "Basic plan",
                         "product": "prod_00000000000000",
                         "tiers": null,
                         "tiers_mode": null,
                         "transform_usage": null,
                         "trial_period_days": 7,
                         "usage_type": "licensed"
                       },
                       "previous_attributes": {
                         "name": "Old name"
                       }
                     }
                    }');

        $controller = new WebhookController();
        $controller->setContainer($container);

        // We need to refactor the controller to be testable (impossible to mock $stripeEventApi = new StripeEventApi();
        $controller->handleAction($request);
    }


}
