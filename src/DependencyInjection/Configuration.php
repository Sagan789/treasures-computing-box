<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 05/12/2017
 * Time: 17:45
 */

namespace App\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('default_clocks');

        $rootNode
            ->children()
            ->children()
            ->scalarNode('time_zone')
            ->scalarNode('city')
            ->scalarNode('country')
            ->end()
            ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}