<?php
namespace Raspberry;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\RaspberryController::class => InvokableFactory::class,
            Controller\RaspberryExternalController::class => InvokableFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'raspberry' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/raspberry',
                    'defaults' => [
                        'controller'    => Controller\RaspberryController::class,
                        'action'        => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'request' => [
                        'type'    => 'Literal',
                        'options'=>[
                            'route'    => '/request',
                            'defaults' => [
                                'controller'    => Controller\RaspberryController::class,
                                'action'        => 'request',
                            ],
                        ],
                    ],
                    'externalrequest' => [
                        'type'    => 'Literal',
                        'options'=>[
                            'route'    => '/externalrequest',
                            'defaults' => [
                                'controller'    => Controller\RaspberryExternalController::class,
                                'action'        => 'externalrequest',
                            ],
                        ],
                    ],
                    'reciveExternal' => [
                        'type'    => 'Literal',
                        'options'=>[
                            'route'    => '/reciveexternal',
                            'defaults' => [
                                'controller'    => Controller\RaspberryExternalController::class,
                                'action'        => 'reciveExternal',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'raspberry' => __DIR__ . '/../view',
        ],
    ],
];
