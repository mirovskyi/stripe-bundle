<?php

namespace Aimir\StripeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;

class AimirStripeBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $this->addRegisterMappingPass($container);
    }

    protected function addRegisterMappingPass(ContainerBuilder $container)
    {
        $mappings = array(
            realpath(__DIR__ . '/Resources/config/doctrine/model') => 'Aimir\StripeBundle\Model'
        );

        $container->addCompilerPass(DoctrineOrmMappingsPass::createXmlMappingDriver($mappings));
    }
}
