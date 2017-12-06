<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 05/12/2017
 * Time: 17:13
 */

namespace App\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\Loader\YamlFileLoader;

class ConfigurationExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../../config/packages/clocks')
        );
        $loader->load('default_clocks.yaml');
    }
}