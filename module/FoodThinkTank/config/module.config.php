<?php
namespace FoodThinkTank;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
//            Controller\RaspberryExternalController::class => InvokableFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'home' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller'    => Controller\IndexController::class,
                        'action'        => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
//                    'request' => [
//                        'type'    => 'Literal',
//                        'options'=>[
//                            'route'    => '/request',
//                            'defaults' => [
//                                'controller'    => Controller\IndexController::class,
//                                'action'        => 'request',
//                            ],
//                        ],
//                    ],
//                    'externalrequest' => [
//                        'type'    => 'Literal',
//                        'options'=>[
//                            'route'    => '/externalrequest',
//                            'defaults' => [
//                                'controller'    => Controller\RaspberryExternalController::class,
//                                'action'        => 'externalrequest',
//                            ],
//                        ],
//                    ],
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
