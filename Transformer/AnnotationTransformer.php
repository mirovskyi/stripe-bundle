<?php

namespace Miracode\StripeBundle\Transformer;

use Doctrine\Common\Annotations\AnnotationReader;
use Miracode\StripeBundle\Annotation\StripeObjectParam;
use Miracode\StripeBundle\Model\StripeModelInterface;
use Miracode\StripeBundle\Stripe\StripeObjectType;
use Stripe\StripeObject;

class AnnotationTransformer implements TransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function transform(
        StripeObject $stripeObject,
        StripeModelInterface $model
    ) {
        $r = new \ReflectionObject($model);
        $annotationReader = new AnnotationReader();
        $props = $r->getProperties();
        foreach ($props as $prop) {
            /** @var StripeObjectParam $stripeObjectParam */
            $stripeObjectParam = $annotationReader->getPropertyAnnotation(
                $prop,
                "Miracode\StripeBundle\Annotation\StripeObjectParam"
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
                if ($stripeObjectParam->embeddedId) {
                    $paths = explode('.', $stripeObjectParam->embeddedId);
                    foreach ($paths as $path) {
                        if (!isset($value[$path])) {
                            break;
                        }
                        $value = $value[$path];
                    }
                } else {
                    if (isset($value->object) &&
                        $value->object == StripeObjectType::COLLECTION
                    ) {
                        $value = array_map(function(StripeObject $obj) {
                            return $obj->__toArray(true);
                        }, $value->data);
                    } else {
                        $value = $value->__toArray(true);
                    }
                }
            }

            $setter = 'set' . ucfirst($prop->getName());
            call_user_func([$model, $setter], $value);
        }
    }
}
