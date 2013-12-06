<?php

namespace Synaq\CurlBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class SynaqCurlExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.xml');

        if (!isset($config['user_agent'])) {
            throw new \InvalidArgumentException(
                'The "synaq_curl.user_agent" option must be set'
            );
        }

        if (!isset($config['cookie_file'])) {
            throw new \InvalidArgumentException(
                'The "synaq_curl.cookie_file" option must be set'
            );
        }

        if (!isset($config['follow_redirects'])) {
            throw new \InvalidArgumentException(
                'The "synaq_curl.follow_redirects" option must be set'
            );
        }

        if (!isset($config['referrer'])) {
            throw new \InvalidArgumentException(
                'The "synaq_curl.referrer" option must be set'
            );
        }

        if (!isset($config['options'])) {
            throw new \InvalidArgumentException(
                'The "synaq_curl.options" option must be set'
            );
        }

        if (!isset($config['headers'])) {
            throw new \InvalidArgumentException(
                'The "synaq_curl.headers" option must be set'
            );
        }

        $container->setParameter('synaq_curl.user_agent', $config['user_agent']);
        $container->setParameter('synaq_curl.cookie_file', $config['cookie_file']);
        $container->setParameter('synaq_curl.follow_redirects', $config['follow_redirects']);
        $container->setParameter('synaq_curl.referrer', $config['referrer']);
        $container->setParameter('synaq_curl.options', $config['options']);
        $container->setParameter('synaq_curl.headers', $config['headers']);
    }
}
