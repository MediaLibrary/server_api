<?php

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ConsoleBannerProviderInterface;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\Console\Adapter\AdapterInterface;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface, ConsoleBannerProviderInterface, ConsoleUsageProviderInterface
{
    const VERSION = '1.0.0';

    public function onBootstrap(MvcEvent $event)
    {
        $eventManager        = $event->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
    * Returns a string containing a banner text, that describes the module and/or the application.
    * The banner is shown in the console window, when the user supplies invalid command-line parameters or invokes
    * the application with no parameters.
    *
    * The method is called with active Zend\Console\Adapter\AdapterInterface that can be used to directly access Console and send
    * output.
    *
    * @param AdapterInterface $console
    * @return string|null
    */
    public function getConsoleBanner(AdapterInterface $console)
    {
        return 'Media Library Server Api - Version ' . self::VERSION;
    }
    /**
    * @param AdapterInterface $console
    * @return array|null|string
    */
    public function getConsoleUsage(AdapterInterface $console)
    {
        return array(
            //'console index [--verbose]' => 'run index'
        );
    }
}
