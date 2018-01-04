<?php

namespace Miracode\StripeBundle\Controller;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Stripe\StripeObjectType;
use Miracode\StripeBundle\StripeException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Stripe\Event as StripeEventApi;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class WebhookController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     * @throws StripeException
     */
    public function handleAction(Request $request)
    {
        $requestData = json_decode($request->getContent());
        if (!isset($requestData->id) || !isset($requestData->object)) {
            throw new BadRequestHttpException('Invalid webhook request data');
        }
        if ($requestData->object !== StripeObjectType::EVENT) {
            throw new StripeException('Unknown stripe object type in webhook');
        }
        $stripeEventApi = new StripeEventApi();
        if (!$stripeEventObject = $stripeEventApi->retrieve($requestData->id)) {
            throw new StripeException(
                sprintf('Event does not exists, id %s', $requestData->id)
            );
        }

        $event = new StripeEvent($stripeEventObject);
        $this
            ->get('event_dispatcher')
            ->dispatch('stripe.' . $stripeEventObject->type, $event);

        return new Response();
    }
}
