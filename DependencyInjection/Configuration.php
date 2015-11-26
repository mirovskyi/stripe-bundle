<?php

namespace Aimir\StripeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
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
        $rootNode = $treeBuilder->root('aimir_stripe');

        $supportedDrivers = array('orm', /** coming soon) */);

        $rootNode
            ->children()
                ->scalarNode('db_driver')
                    ->defaultValue('orm')
                    ->validate()
                        ->ifNotInArray($supportedDrivers)
                        ->thenInvalid('The driver %s is not supported. Please choose one of '.json_encode($supportedDrivers))
                    ->end()
                    ->cannotBeOverwritten()
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('model_manager_name')->defaultNull()->end()
                ->scalarNode('secret_key')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
            ->end();

        $this->modelClassesSection($rootNode);

        return $treeBuilder;
    }

    /**
     * @param ArrayNodeDefinition $node
     */
    private function modelClassesSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('model')->isRequired()
                    ->children()
                        ->scalarNode('card')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('charge')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('coupon')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('customer')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('invoice')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('plan')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('refund')->isRequired()->cannotBeEmpty()->end()
                        ->scalarNode('subscription')->isRequired()->cannotBeEmpty()->end()
                    ->end()
                ->end()
            ->end();
    }
}
