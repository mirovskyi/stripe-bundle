MiracodeStripeBundle
====================

The MiracodeStripeBundle integrates Stripe PHP SDK to your Symfony project. 

Currently using this bundle for payments at (https://www.parolla.ie)](https://www.parolla.ie) and (https://tools.parolla.ie)](https://tools.parolla.ie)


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
And set-up required configuration.  

Note that the api version will override your stripe default version. Use this if migrating stripe API version, leave null
if you want to let Stripe use the developer GUI default version.

``` yaml
# app/config/config.yml (or config/packages/miracode_stripe.yaml for Symfony >=3.4)
miracode_stripe:
    api_version: "2019-10-17"
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
or inject the StripeClient

``` php
protected $stripeClient;

public function __construct(\Miracode\StripeBundle\Stripe\StripeClient $stripeClient){
    $this->stripeClient = $stripeClient;
}

public function yourMethod(){
    $customer = $this->stripeClient->retrieveCustomer($stripeCustomerId) 
}
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
use Symfony\Contracts\EventDispatcher\EventSubscriberInterface;

class StripeSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            StripeEvent::CHARGE_SUCCEEDED => 'onChargeSucceededEvent',
        ];
    }

    //[...]
    
    public function onChargeSucceededEvent(StripeEvent $event)
    {
        $stripeEvent = $event->getEvent(); //Stripe event object (instanceof \Stripe\Event)
        $charge = $event->getDataObject(); //Stripe charge object (instanceof \Stripe\Charge)
    }
}
```

For more customised functions you can ignore and extend the bundle subscriber with your own for custom functionality.  

First ignore the default subscriber in the bundle config.
``` yaml
# app/config/config.yml (or config/packages/miracode_stripe.yaml for Symfony >=3.4)
miracode_stripe:
    secret_key: "%stripe_secret_key%"
    use_bundle_subscriber: false
```
Then create your own subscriber that extends the bundle subscriber.  (Autowire or declare the new subscriber)
``` php
// AppBundle/EventListener/StripeEventSubscriber.php

namespace App\EventListener;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\EventListener\StripeEventSubscriber as MiracodeStripeEventSubscriber
use Symfony\Contracts\EventDispatcher\EventSubscriberInterface;

class StripeEventSubscriber extends MiracodeStripeEventSubscriber implements EventSubscriberInterface
{
    public function __construct($modelManager){
        parent::__construct($modelManager);
    }
    
    public static function getSubscribedEvents()
        {
            // Get the Stripe Bundle default subscribed events.
            $parentSubscribedEvents = parent::getSubscribedEvents();
    
            // Add/Overwrite events for this application
            $overideEvents = [
                StripeEvent::INVOICE_UPCOMING => 'onInvoiceUpcoming',
             ];
    
            // Merge the array, replacing the original events.
            $subscribedEvents = array_replace($parentSubscribedEvents, $overideEvents);
    
            return $subscribedEvents;
        }

    //[...]
    
    public function onInvoiceUpcoming(StripeEvent $event)
    {
        $stripeEvent = $event->getEvent(); //Stripe event object (instanceof \Stripe\Event)
        $charge = $event->getDataObject(); //Stripe charge object (instanceof \Stripe\Charge)
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
 - product: `Miracode\StripeBundle\Model\AbstractProductModel`
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
