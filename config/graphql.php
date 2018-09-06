<?php


return [

    'prefix' => 'graphql',

    'domain' => null,

    'routes' => '{graphql_schema?}',

    'controllers' => \Folklore\GraphQL\GraphQLController::class.'@query',

    'variables_input_name' => 'variables',

    'middleware' => [],

    'middleware_schema' => [
        'default' => [],
    ],

    'headers' => [],

    'json_encoding_options' => 0,

    'graphiql' => [
        'routes' => '/graphiql/{graphql_schema?}',
        'controller' => \Folklore\GraphQL\GraphQLController::class.'@graphiql',
        'middleware' => [],
        'view' => 'graphql::graphiql',
        'composer' => \Folklore\GraphQL\View\GraphiQLComposer::class,
    ],

    'schema' => 'default',

    'schemas' => [
        'default' => [
            'query' => [
                //'getArea'       => App\GraphQL\Query\AreaQuery::class,
                //'getCashier'    => App\GraphQL\Query\CashierQuery::class,
                //'getCts'        => App\GraphQL\Query\CtsQuery::class,
                'getBranch'        => App\GraphQL\Query\BrnzoneQuery::class,

            ],
            'mutation' => [
                //Area
                //'AreaCreate' => App\GraphQL\Mutation\AreaCreateMutation::class,
                //'AreaUpdate' => App\GraphQL\Mutation\AreaUpdateMutation::class,
                //'AreaDelete' => App\GraphQL\Mutation\AreaDeleteMutation::class,                
            ]
        ]
    ],

    'resolvers' => [
        'default' => [
        ],
    ],

    'defaultFieldResolver' => null,

    'types' => [
        App\GraphQL\Type\AreaType::class,
        App\GraphQL\Type\CashierType::class,
        App\GraphQL\Type\CtsType::class,
        App\GraphQL\Type\ProvinceType::class,
        App\GraphQL\Type\BrnzoneType::class,
    ],

    'error_formatter' => [\Folklore\GraphQL\GraphQL::class, 'formatError'],

    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false
    ]
];
