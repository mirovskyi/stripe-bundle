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
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('miracode_stripe');

        $supportedDrivers = array('orm', /** coming soon) */);

        $rootNode
            ->children()
                ->scalarNode('secret_key')
                    ->isRequired()
                    ->cannotBeEmpty()
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
                            ->scalarNode('discount')->cannotBeEmpty()->end()
                            ->scalarNode('invoice')->cannotBeEmpty()->end()
                            ->scalarNode('plan')->cannotBeEmpty()->end()
                            ->scalarNode('refund')->cannotBeEmpty()->end()
                            ->scalarNode('subscription')->cannotBeEmpty()->end()
                            ->scalarNode('subscription_item')->cannotBeEmpty()->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
