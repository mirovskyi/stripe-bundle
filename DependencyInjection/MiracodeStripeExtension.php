<?php

namespace Miracode\StripeBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class MiracodeStripeExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.xml');

        $container->setParameter(
            'miracode_stripe.secret_key',
            $config['secret_key']
        );

        if (!empty($config['database']) && !empty($config['database']['model'])) {
            if (!empty($config['database']['model_transformer'])) {
                $container->setAlias(
                    'miracode_stripe.model_transformer',
                    $config['database']['model_transformer']
                );
            } else {
                $container->setAlias(
                    'miracode_stripe.model_transformer',
                    'miracode_stripe.model_transformer.annotation'
                );
            }
            if ($this->configureDatabase($config['database'], $container)) {
                $loader->load('listener.xml');
            }
        }
    }

    /**
     * @param array $config
     * @param ContainerBuilder $container
     *
     * @return bool
     */
    private function configureDatabase($config, ContainerBuilder $container) {
        if ($config['driver'] == 'orm') {
            if (!isset($config['object_manager'])) {
                $config['object_manager'] = 'doctrine.orm.entity_manager';
            }
            $container->setAlias(
                'miracode_stripe.object_manager',
                $config['object_manager']
            );
            $container->setParameter(
                'miracode_stripe.model_classes',
                $config['model']
            );
            $definition = new Definition();
            $definition->setClass(
                'Miracode\\StripeBundle\\Manager\\Doctrine\\DoctrineORMModelManager'
            );
            $definition->setArguments([
                new Reference('miracode_stripe.object_manager'),
                new Reference('miracode_stripe.model_transformer'),
                '%miracode_stripe.model_classes%'
            ]);
            $definition->setPublic(true);
            $container->setDefinition(
                'miracode_stripe.model_manager',
                $definition
            );

            return true;
        }
        //TODO: support other drivers

        return false;
    }
}
