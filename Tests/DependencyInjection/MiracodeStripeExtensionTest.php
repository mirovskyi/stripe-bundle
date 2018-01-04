<?php

namespace Miracode\StripeBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Miracode\StripeBundle\DependencyInjection\MiracodeStripeExtension;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\Yaml\Parser;

class MiracodeStripeExtensionTest extends TestCase
{
    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testEmptyConfiguration()
    {
        $extension = new MiracodeStripeExtension();
        $extension->load([], new ContainerBuilder());
    }

    public function testStripeSecretKey()
    {
        $config = $this->getSimpleConfig();
        $container = new ContainerBuilder();
        $extension = new MiracodeStripeExtension();
        $extension->load($config, $container);
        $this->assertEquals(
            $config['miracode_stripe']['secret_key'],
            $container->getParameter('miracode_stripe.secret_key')
        );
    }

    public function testConfigWithoutDatabase()
    {
        $config = $this->getSimpleConfig();
        $container = new ContainerBuilder();
        $extension = new MiracodeStripeExtension();
        $extension->load($config, $container);
        $this->assertFalse($container->has('miracode_stripe.model_transformer'));
        $this->assertFalse($container->has('miracode_stripe.object_manager'));
        $this->assertFalse($container->has('miracode_stripe.model_manager'));
        $this->assertFalse($container->has('miracode_stripe.subscriber.stripe_event'));
        $this->assertFalse($container->hasParameter('miracode_stripe.model_classes'));
    }

    public function testDefaultDatabaseConfiguration()
    {
        $config = $this->getSimpleConfigWithDatabase();
        $container = new ContainerBuilder();
        $this->setDefinition(
            'doctrine.orm.entity_manager',
            'Miracode\\StripeBundle\\Tests\\Mock\\EntityManagerMock',
            $container
        );
        $extension = new MiracodeStripeExtension();
        $extension->load($config, $container);
        $this->assertTrue($container->has('miracode_stripe.model_transformer'));
        $this->assertInstanceOf(
            'Miracode\\StripeBundle\\Transformer\\AnnotationTransformer',
            $container->get('miracode_stripe.model_transformer')
        );
        $this->assertTrue($container->has('miracode_stripe.object_manager'));
        $this->assertInstanceOf(
            'Miracode\\StripeBundle\\Tests\\Mock\\EntityManagerMock',
            $container->get('miracode_stripe.object_manager')
        );
        $this->assertTrue($container->has('miracode_stripe.model_manager'));
        $this->assertInstanceOf(
            'Miracode\\StripeBundle\\Manager\\Doctrine\\DoctrineORMModelManager',
            $container->get('miracode_stripe.model_manager')
        );
        $this->assertEquals(
            $config['miracode_stripe']['database']['model'],
            $container->getParameter('miracode_stripe.model_classes')
        );
        $this->assertTrue($container->has('miracode_stripe.subscriber.stripe_event'));
    }

    public function testFullConfiguration()
    {
        $config = $this->getFullConfig();
        $container = new ContainerBuilder();
        $this->setDefinition(
            'miracode_stripe.test.entity_manager',
            'Miracode\\StripeBundle\\Tests\\Mock\\CustomEntityManagerMock',
            $container
        );
        $this->setDefinition(
            'miracode_stripe.test.transformer',
            'Miracode\\StripeBundle\\Tests\\Mock\\TransformerMock',
            $container
        );
        $extension = new MiracodeStripeExtension();
        $extension->load($config, $container);
        $this->assertInstanceOf(
            'Miracode\\StripeBundle\\Tests\\Mock\\TransformerMock',
            $container->get('miracode_stripe.model_transformer')
        );
        $this->assertInstanceOf(
            'Miracode\\StripeBundle\\Tests\\Mock\\CustomEntityManagerMock',
            $container->get('miracode_stripe.object_manager')
        );
    }

    protected function getSimpleConfig()
    {
        $yaml = <<<EOF
miracode_stripe:
    secret_key: some_secret_key
EOF;
        $parser = new Parser();

        return $parser->parse($yaml);
    }

    protected function getSimpleConfigWithDatabase()
    {
        $yaml = <<<EOF
miracode_stripe:
    secret_key: some_secret_key
    database:
        model:
            customer: Miracode\StripeBundle\Tests\TestModel\TestCustomer
EOF;
        $parser = new Parser();

        return $parser->parse($yaml);
    }

    protected function getFullConfig()
    {
        $yaml = <<<EOF
miracode_stripe:
    secret_key: some_secret_key
    database:
        driver: orm
        object_manager: miracode_stripe.test.entity_manager
        model_transformer: miracode_stripe.test.transformer
        model:
            customer: Miracode\StripeBundle\Tests\TestModel\TestCustomer
EOF;
        $parser = new Parser();

        return $parser->parse($yaml);
    }

    protected function setDefinition($id, $class, ContainerBuilder $container)
    {
        $definition = new Definition();
        $definition->setClass($class);
        $container->setDefinition($id, $definition);
    }
}
