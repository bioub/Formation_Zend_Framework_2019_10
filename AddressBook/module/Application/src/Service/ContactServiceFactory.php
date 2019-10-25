<?php

namespace Application\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Service\ContactService;

class ContactServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return ContactService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ContactService($container->get(\Doctrine\ORM\EntityManager::class));
    }
}