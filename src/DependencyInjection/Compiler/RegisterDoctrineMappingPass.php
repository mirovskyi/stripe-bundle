<?php

namespace Miracode\StripeBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;

class RegisterDoctrineMappingPass implements CompilerPassInterface
{

    /**
     * You can modify the container here before it is dumped to PHP code.
     */
    public function process(ContainerBuilder $container)
    {
        $mappings = array(
            realpath(__DIR__ . '/../../Resources/config/doctrine/model') =>
                'Miracode\StripeBundle\Model'
        );

        DoctrineOrmMappingsPass::createXmlMappingDriver($mappings)
            ->process($container);
    }
}
