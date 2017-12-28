<?php

namespace Miracode\StripeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;

class MiracodeStripeBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        \Stripe\Stripe::setApiKey(
            $this->container->getParameter('miracode_stripe.secret_key')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $this->addRegisterMappingPass($container);
    }

    /**
     * Register ORM model mapping
     *
     * @param ContainerBuilder $container
     */
    protected function addRegisterMappingPass(ContainerBuilder $container)
    {
        $mappings = array(
            realpath(__DIR__ . '/Resources/config/doctrine/model') =>
                'Miracode\StripeBundle\Model'
        );

        $container->addCompilerPass(
            DoctrineOrmMappingsPass::createXmlMappingDriver($mappings)
        );
    }
}
