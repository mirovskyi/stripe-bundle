<?php

namespace Miracode\StripeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('miracode_stripe');
        
        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // for symfony/config 4.1 and older
            $rootNode = $treeBuilder->root('miracode_stripe');
        }

        $supportedDrivers = array('orm', /** coming soon) */);

        $rootNode
            ->children()
                ->scalarNode('secret_key')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('webhook_secret')
                    ->defaultNull()
                ->end()
                ->booleanNode('use_bundle_subscriber')
                    ->defaultTrue()
                ->end()
                ->arrayNode('database')
                ->children()
                    ->scalarNode('driver')
                        ->defaultValue('orm')
                        ->validate()
                            ->ifNotInArray($supportedDrivers)
                            ->thenInvalid('Database driver %s does not support')
                        ->end()
                    ->end()
                    ->scalarNode('object_manager')->end()
                    ->scalarNode('model_transformer')->end()
                    ->arrayNode('model')
                        ->children()
                            ->scalarNode('card')->cannotBeEmpty()->end()
                            ->scalarNode('charge')->cannotBeEmpty()->end()
                            ->scalarNode('coupon')->cannotBeEmpty()->end()
                            ->scalarNode('customer')->cannotBeEmpty()->end()
                            ->scalarNode('tax_id')->cannotBeEmpty()->end()
                            ->scalarNode('discount')->cannotBeEmpty()->end()
                            ->scalarNode('invoice')->cannotBeEmpty()->end()
                            ->scalarNode('payout')->cannotBeEmpty()->end()
                            ->scalarNode('product')->cannotBeEmpty()->end()
                            ->scalarNode('plan')->cannotBeEmpty()->end()
                            ->scalarNode('refund')->cannotBeEmpty()->end()
                            ->scalarNode('subscription')->cannotBeEmpty()->end()
                            ->scalarNode('subscription_item')->cannotBeEmpty()->end()
                            ->scalarNode('tax_rate')->cannotBeEmpty()->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
