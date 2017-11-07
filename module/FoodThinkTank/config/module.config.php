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
            'display_not_found_reason' => true,
            'display_exceptions'       => true,
            'doctype'                  => 'HTML5',
            'not_found_template'       => 'error/404',
            'exception_template'       => 'error/index',
            'template_map' => [
                'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
                'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
                'error/404'               => __DIR__ . '/../view/error/404.phtml',
                'error/index'             => __DIR__ . '/../view/error/index.phtml',
            ],
        'template_path_stack' => [
            'raspberry' => __DIR__ . '/../view',
        ],
    ],
];
