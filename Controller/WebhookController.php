<?php

namespace Miracode\StripeBundle\Controller;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Stripe\StripeObjectType;
use Miracode\StripeBundle\StripeException;
use Stripe\Error\SignatureVerification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Stripe\Webhook;
use Stripe\Event as StripeEventApi;

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

        // secure webhook with event signature: https://stripe.com/docs/webhooks/signatures
        $webhookSecret = $this->getParameter('miracode_stripe.webhook_secret');
        if($webhookSecret !== null) {
            $sigHeader = $request->headers->get('HTTP_STRIPE_SIGNATURE');
            try {
                $event = Webhook::constructEvent(
                    $request->getContent(), $sigHeader, $webhookSecret
                );
            } catch(\UnexpectedValueException $e) {
                // Invalid payload
                throw new StripeException(
                    sprintf('Invalid event payload', $requestData->id)
                );
            } catch(SignatureVerification $e) {
                // Invalid signature
                throw new StripeException(
                    sprintf('Invalid event signature', $requestData->id)
                );
            }
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
