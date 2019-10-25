<?php

namespace Application\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Controller\ContactController;

class ContactControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return ContactController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ContactController($container->get(\Application\Service\ContactService::class));
    }
}