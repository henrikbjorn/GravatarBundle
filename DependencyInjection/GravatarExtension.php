<?php
namespace Bundle\GravatarBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Symfony\Component\Config\FileLocator;

class GravatarExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(array(__DIR__.'/../Resources/config')));
        $loader->load('config.xml');

        $parameters = array();
        foreach ($configs as $config) {
            foreach (array('size', 'rating', 'default') as $key) {
                if (isset($config[$key])) {
                    $parameters[$key] = $config[$key];
                }
            }
        }

        $container->getDefinition('gravatar.api')->addArgument($parameters);
    }
}
