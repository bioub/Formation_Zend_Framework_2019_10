<?php

namespace Application\Controller;

use Application\Controller\SocieteController;
use Application\Service\SocieteService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class SocieteControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return SocieteController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SocieteController($container->get(SocieteService::class));
    }
}
