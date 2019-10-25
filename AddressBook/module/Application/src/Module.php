<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface, BootstrapListenerInterface
{
    const VERSION = '3.0.3-dev';
    
    public function onBootstrap(\Zend\EventManager\EventInterface $e): void
    {
        /* @var $mvcevent \Zend\Mvc\MvcEvent */
        $mvcevent = $e;
        
        $em = $mvcevent->getApplication()->getEventManager();
        
        $em->attach(\Zend\Mvc\MvcEvent::EVENT_ROUTE, function(\Zend\Mvc\MvcEvent $e) {
            $match = $e->getRouteMatch();
            
            if ($match->getMatchedRouteName() === 'contact/add') {
                
            }
        });
    }

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

}
