<?php

declare(strict_types=1);

namespace Atividade;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'atividade' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/atividade[/:id]',
                    'defaults' => [
                        'controller'    => Controller\AtividadeController::class,
                        'isAuthorizationRequired' => false 
                    ],
                    'constraints' => [
                        'formatter' => '[a-zA-Z0-9_-]*',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\AtividadeController::class => Controller\Factory\AtividadeControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ]
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ],
    ],
    'data-fixture' => [
        'Atividade_fixture' => __DIR__ . '/../src/' . __NAMESPACE__ . '/Atividade',
    ],
];
