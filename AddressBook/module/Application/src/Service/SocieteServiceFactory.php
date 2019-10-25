<?php

namespace Application\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Service\SocieteService;

class SocieteServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return SocieteService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SocieteService($container->get(\Doctrine\ORM\EntityManager::class));
    }
}