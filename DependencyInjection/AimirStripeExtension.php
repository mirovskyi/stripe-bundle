<?php

namespace Aimir\StripeBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class AimirStripeExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        if ($customManagerName = $config['model_manager_name']) {
            $container->setAlias('aimir_stripe.object_manager', $customManagerName);
        } else {
            if ($config['db_driver'] === 'orm') {
                $doctrineService = 'doctrine.orm.entity_manager';
            } else {
                //TODO: support another db_drivers (mongodb, couchdb, propel)
                $doctrineService = null;
            }
            $container->setAlias('aimir_stripe.object_manager', $doctrineService);
            $container->setParameter('aimir_stripe.model_manager_name', $doctrineService);
        }

        foreach ($config['model'] as $name => $class) {
            $container->setParameter(sprintf('aimir_stripe.model.%s.class', $name), $class);
        }

        $loader->load('services.xml');
        $loader->load('listener.xml');
    }
}
