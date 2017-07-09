<?php
interface IPlugin
{
    public static function getName();
}

class Plugin implements IPlugin
{
    public static function getName()
    {
        return 'Plugin';
    }

    public static function getItems()
    {
        return array(
            array(
                'title'=>'reflection'
            )
        );
    }
}

function findPlugins()
{
    $plugins = array();
    foreach(get_declared_classes() as $class){
        $reflectionClass = new ReflectionClass($class);
        if($reflectionClass->implementsInterface('IPlugin')){
            $plugins[] = $reflectionClass;
        }
    }
    return $plugins;
}

function Items()
{
    $items = array();
    foreach(findPlugins() as $plugin){
        if($plugin->hasMethod('getItems')){
            $reflectionMethod = $plugin->getMethod('getItems');
            if($reflectionMethod->isStatic()){
                $item = $reflectionMethod->invoke(null);
            }else{
                $pluginInstance = $plugin->newInstance();
                $item = $pluginInstance->invoke();
            }
        }
        $items = array_merge($items, $item);
    }
    return $items;
}

$item = Items();
print_r($item);