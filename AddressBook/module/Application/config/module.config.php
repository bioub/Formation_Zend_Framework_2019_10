<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

use Application\Controller\ContactController;
use Application\Controller\ContactControllerFactory;
use Application\Controller\IndexController;
use Application\Controller\SocieteController;
use Application\Controller\SocieteControllerFactory;
use Application\Service\ContactService;
use Application\Service\ContactServiceFactory;
use Application\Service\SocieteService;
use Application\Service\SocieteServiceFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'contacts' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/contacts',
                    'defaults' => [
                        'controller' => ContactController::class,
                        'action' => 'list',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'show' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/:id',
                            'constraints' => [
                                'id' => '[1-9][0-9]*',
                            ],
                            'defaults' => [
                                'controller' => ContactController::class,
                                'action' => 'show',
                            ],
                        ],
                    ],
                    'add' => [
                        'type' => Literal::class,
                        'options' => [
                            'route' => '/add',
                            'defaults' => [
                                'controller' => ContactController::class,
                                'action' => 'create',
                            ],
                        ],
                    ],
                ]
            ],
            'societes' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/societes',
                    'defaults' => [
                        'controller' => SocieteController::class,
                        'action' => 'list',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'show' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/:id',
                            'constraints' => [
                                'id' => '[1-9][0-9]*',
                            ],
                            'defaults' => [
                                'controller' => SocieteController::class,
                                'action' => 'show',
                            ],
                        ],
                    ],
                ]
            ],
            'application' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/application[/:action]',
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            ContactService::class => ContactServiceFactory::class,
            SocieteService::class => SocieteServiceFactory::class
        ]
    ],
    'controllers' => [
        'factories' => [
            IndexController::class => InvokableFactory::class,
            ContactController::class => ContactControllerFactory::class,
                /*
                 * function($container) {
                // $container = $container->getParent(); // Zend ServiceManager V2
                $contactService = $container->get(ContactService::class);
                return new ContactController($contactService);
            },
                 */
            SocieteController::class => SocieteControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => false,
        'display_exceptions' => false,
        //'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
//        'template_map' => [
//            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
//            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
//            'error/404' => __DIR__ . '/../view/error/404.phtml',
//            'error/index' => __DIR__ . '/../view/error/index.phtml',
//        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            'my_annotation_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../src/Entity',
                ],
            ],
            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default' => [
                'drivers' => [
                    // register `my_annotation_driver` for any entity under namespace `My\Namespace`
                    'Application\Entity' => 'my_annotation_driver',
                ],
            ],
        ],
    ],
];
