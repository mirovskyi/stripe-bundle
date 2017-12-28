<?php

namespace Miracode\StripeBundle\Model\Transformer;

use Doctrine\Common\Annotations\SimpleAnnotationReader;
use Miracode\StripeBundle\Annotation\StripeObjectParam;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Miracode\StripeBundle\Model\StripeModelInterface;
use Stripe\StripeObject;

class AnnotationTransformer
{
    /**
     * Transform stripe object into model data by model annotations
     *
     * @param StripeModelInterface $model
     * @param StripeObject $stripeObject
     */
    public static function transform(
        StripeModelInterface $model,
        StripeObject $stripeObject
    ) {
        $accessor = PropertyAccess::createPropertyAccessor();
        $r = new \ReflectionObject($model);
        $annotationReader = new SimpleAnnotationReader();
        $props = $r->getProperties();
        foreach ($props as $prop) {
            /** @var StripeObjectParam $stripeObjectParam */
            $stripeObjectParam = $annotationReader->getPropertyAnnotation(
                $prop,
                "Miracode\Annotation\StripeObjectParam"
            );
            if (!$stripeObjectParam) {
                continue;
            }
            if (!$name = $stripeObjectParam->name) {
                $name = strtolower($prop->getName());
            }
            if (!isset($stripeObject[$name])) {
                continue;
            }
            $value = $stripeObject[$name];
            if ($value instanceof StripeObject) {
                if ($stripeObjectParam->embeddedId &&
                    isset($value[$stripeObjectParam->embeddedId])) {
                    $value = $value[$stripeObjectParam->embeddedId];
                } else {
                    $value = $value->__toArray();
                }
            }

            $accessor->setValue($model, $prop->getName(), $value);
        }
    }
}
