<?php
namespace FoodThinkTank;

use FoodThinkTank\Controller\SubPage\SubPageController;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\SubPage\SubPageController::class => InvokableFactory::class,
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
                ],
            ],
            'projects' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/projects',
                    'defaults' => [
                        'controller'    => SubPageController::class,
                        'action'        => 'projects',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                ],
            ],
            'people' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/people',
                    'defaults' => [
                        'controller'    => SubPageController::class,
                        'action'        => 'people',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                ],
            ],
            'activities' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/activities',
                    'defaults' => [
                        'controller'    => SubPageController::class,
                        'action'        => 'activities',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                ],
            ],
            'workshop' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/workshop',
                    'defaults' => [
                        'controller'    => SubPageController::class,
                        'action'        => 'workshop',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
//                    'subpage' => [
//                        'type'    => 'Literal',
//                        'options'=>[
//                            'route'    => '/subpage',
//                            'defaults' => [
//                                'controller'    => Controller\SubPage\SubPageController::class,
//                                'action'        => 'subpage',
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
            'initiatives' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/initiatives',
                    'defaults' => [
                        'controller'    => SubPageController::class,
                        'action'        => 'initiatives',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                ],
            ],
            'contact' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/contact',
                    'defaults' => [
                        'controller'    => SubPageController::class,
                        'action'        => 'contact',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
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
