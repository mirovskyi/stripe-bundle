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

        $container->setParameter(
            'miracode_stripe.secret_key',
            $config['secret_key']
        );

        if (!empty($config['database'])) {
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
        if (!isset($config['model'])) {
            return false;
        }
        if ($config['driver'] == 'orm') {
            if (!isset($config['object_manager'])) {
                $config['object_manager'] = 'doctrine.orm.entity_manager';
            }
            $container->setAlias(
                'miracode_stripe.object_manager',
                $config['object_manager']
            );
            //TODO: take from configuration settings
            $availableModels = ['card','charge','coupon','customer','discount','invoice','plan','refund','subscription'];
            foreach ($availableModels as $modelName) {
                $definition = new Definition();
                if (isset($config['model'][$modelName])) {
                    $definition->setClass(
                        'Miracode\\StripeBundle\\Manager\\Doctrine\\DoctrineORMManager'
                    );
                    $definition->setArguments([
                        new Reference('miracode_stripe.object_manager'),
                        $config['model'][$modelName]
                    ]);
                } else {
                    $definition->setClass(
                        'Miracode\\StripeBundle\\Manager\\NoneManager'
                    );
                }
                $container->setDefinition(
                    sprintf('miracode_stripe.manager.%s', $modelName),
                    $definition
                );
            }
        }

        return true;
    }
}
