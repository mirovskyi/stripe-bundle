MiracodeStripeBundle
====================

The MiracodeStripeBundle integrates Stripe PHP SDK to your Symfony project. 
Also you can configure bundle to save Stripe data in database. 
You are free to choose what Stripe objects will be stored. 

This bundle  tested on Symfony versions 2.7, 2.8, 3.1, 3.3, 3.4, 4.0. Compatible with Symfony >=2.4 

[![Build Status](https://travis-ci.org/mirovskyi/stripe-bundle.svg?branch=1.0)](https://travis-ci.org/mirovskyi/stripe-bundle)


Installation
------------

To install this bundle, run the command below and you will get the latest stable version.

``` bash
composer require miracode/stripe-bundle
```

Register bundle

``` php
// app/AppKernel.php
public function registerBundles()
{
  $bundles = array(
    // [...]
    new Miracode\StripeBundle\MiracodeStripeBundle(),
  );
}
```

For Symfony >=3.4

``` php
// config/bundles.php
return [
    // [...]
    Miracode\StripeBundle\MiracodeStripeBundle::class => ['all' => true],
];
```
And set-up required configuration

``` yaml
# app/config/config.yml (or config/packages/miracode_stripe.yaml for Symfony >=3.4)
miracode_stripe:
    secret_key: "%stripe_secret_key%"
```

Usage
-----

After minimal bundle configuration you can start using Stripe SDK. 

For example create new customer:

``` php
$customer = \Stripe\Customer::create([
    'email' => 'newcustomer@example.com'
]);
```

####Stripe Events

Add bundle routing configuration to enable Stripe webhooks handler

``` yaml
# app/config/routing.yml (or config/routing.yaml for Symfony >=3.4)
miracode_stripe:
    resource: '@MiracodeStripeBundle/Resources/config/routing.xml'
```

This will register route with url `/stripe/webhook`. You should add this webhook endpoint in Stripe Dashboard. Finally you will be able to listen all Stripe events.

For example for stripe event `charge.succeeded` webhook controller will dispatch event `stripe.charge.succeeded`.

Event Subscriber example:

``` php
// src/EventListener/StripeSubscriber.php

namespace App\EventListener;

use Miracode\StripeBundle\Event\StripeEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class StripeSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            'stripe.charge.succeeded' => 'onChargeSucceededEvent',
        ];
    }

    //[...]
    
    public function onChargeSucceededEvent(StripeEvent $event)
    {
        $stripeEvent = $event->getEvent(); //Stripe event object (instanceof \Stripe\Event)
        $charge = $event->getObjectData(); //Stripe charge object (instanceof \Stripe\Charge)
    }
}
```

####Saving stripe data in database

Now only Doctrine ORM driver is available.

In bundle there are abstract entity classes with orm mapping for main stripe objects:

 - card: `Miracode\StripeBundle\Model\AbstractCardModel`
 - charge: `Miracode\StripeBundle\Model\AbstractChargeModel`
 - coupon: `Miracode\StripeBundle\Model\AbstractCouponModel`
 - customer: `Miracode\StripeBundle\Model\AbstractCustomerModel`
 - invoice: `Miracode\StripeBundle\Model\AbstractInvoiceModel`
 - plan: `Miracode\StripeBundle\Model\AbstractPlanModel`
 - refund: `Miracode\StripeBundle\Model\AbstractRefundModel`
 - subscription: `Miracode\StripeBundle\Model\AbstractSubscriptionModel`
 
Use this abstract classes to create entities. For example charge entity class:

``` php
// src/Entity/Charge.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Miracode\StripeBundle\Model\AbstractChargeModel;

/**
 * @ORM\Entity()
 * @ORM\Table(name="stripe_charge")
 */
class Charge extends AbstractChargeModel
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    protetced $id;
}
```

You must also specify entity classes in the bundle configuration

``` yaml
# app/config/config.yml (or config/packages/miracode_stripe.yaml for Symfony >=3.4)
miracode_stripe:
    #...
    database:
        model:
            charge:   'App\Entity\Charge'   #To store stripe charges
            card:     'App\Entity\Card'     #To store stripe cards
            customer: 'App\Entity\Customer' #To store stripe customers  
            #...
```

After adding entity classes in bundle configuration you can use model manager service to store stripe data.

For example:

``` php
//Create new customer
$customer = \Stripe\Customer::create([
    'email' => 'newcustomer@example.com'
]);

//Create new card for customer
$card = $customer->sources->create([
    'source' => [
        'object' => 'card',
        'exp_month' => '12',
        'exp_year' => '2020',
        'number' => '4111111111111111',
        'cvc' => '123'
    ]
]);

//Create payment with customer card
$charge = \Stripe\Charge::create([
    'customer' => $customer->id,
    'amount' => 100,
    'currency' => 'usd',
    'source' => $card->id
]);

//Save stripe objects in database
//You can remove this code and entities will be created automatically by webhooks handler 
//(see Miracode\StripeBundle\EventListener\StripeEventSubscriber)
$this->get('miracode_stripe.model_manager')->save($customer);     //Don't flush changes. Return new Customer entity object.
$this->get('miracode_stripe.model_manager')->save($card);         //Don't flush changes. Return new Card entity object.
$this->get('miracode_stripe.model_manager')->save($charge, true); //FLUSH changes in DB. Return new Charge entity object.
```

If you enabled webhooks handling (described above), you can omit using model manager service to save objects data. 
There is event subscriber that will save/update/remove configured entities by stripe events automatically.

**Note** some data can be deleted by webhooks handler. If you want to use safe delete technique, implement interface `Miracode\StripeBundle\Model\SafeDeleteModelInterface` in your entity classes. 
Also you can use trait `Miracode\StripeBundle\Model\Traits\SafeDeleteTrait` for easy interface implementation. 


License
-------

This bundle is released under the MIT license. See the included [LICENSE](LICENSE) file for more information.