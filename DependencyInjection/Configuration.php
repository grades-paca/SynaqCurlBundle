<?php

namespace Synaq\CurlBundle\DependencyInjection;

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
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('synaq_curl');

        $rootNode
            ->children()
            ->scalarNode('user_agent')->defaultValue('user_agent')->end()
            ->scalarNode('cookie_file')->defaultFalse()->end()
            ->scalarNode('follow_redirects')->defaultTrue()->end()
            ->scalarNode('referrer')->defaultValue('referrer')->end()
            ->variableNode('options')->defaultValue(array())->end()
            ->variableNode('headers')->defaultValue(array())->end()
            ->end();

        return $treeBuilder;
    }
}
