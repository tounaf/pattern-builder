<?php

namespace App\DependencyInjection\Compiler;

use App\Builder\BuilderResolver;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use Symfony\Component\DependencyInjection\Reference;

class StatusBuilderCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(BuilderResolver::class)) {
            throw new ServiceNotFoundException('BuilderResolver not found (BuilderResolver::class).');
        }

        $builderResolver = $container->getDefinition(BuilderResolver::class);

        foreach ($container->findTaggedServiceIds('app.status_builder') as $id => $tags) {
            $builderResolver->addMethodCall('addBuilder', [new Reference($id)]);
        }
    }
}
