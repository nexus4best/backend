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

                //Office
                'getArea'       => App\GraphQL\Query\AreaQuery::class,
                'getZone'       => App\GraphQL\Query\BrnzoneQuery::class,
                'getProvince'    => App\GraphQL\Query\ProvinceQuery::class,
                'getCts'        => App\GraphQL\Query\CtsQuery::class,
                'getAreaGroup'  => App\GraphQL\Query\AreaGroupQuery::class,
                'getBrnChoice'     => App\GraphQL\Query\BrnchoiceQuery::class,
                'getBrnStatus'     => App\GraphQL\Query\BrnstatusQuery::class,

                'getBrnRepairCts'     => App\GraphQL\Query\BrnRepairCtsQuery::class,

                //Branch
                'getBranch'       => App\GraphQL\Query\BrnzoneQuery::class,
                'getBrnRepair'     => App\GraphQL\Query\BrnrepairQuery::class,

            ],
            'mutation' => [
                //Area
                'AreaCreate' => App\GraphQL\Mutation\AreaCreateMutation::class,
                'AreaUpdate' => App\GraphQL\Mutation\AreaUpdateMutation::class,
                'AreaDelete' => App\GraphQL\Mutation\AreaDeleteMutation::class,  
                //BrnChoice
                'BrnChoiceCreate' => App\GraphQL\Mutation\BrnchoiceCreateMutation::class,
                'BrnChoiceUpdate' => App\GraphQL\Mutation\BrnchoiceUpdateMutation::class,  
                'BrnChoiceDelete' => App\GraphQL\Mutation\BrnchoiceDeleteMutation::class,    
                //BrnStatus
                'BrnStatusCreate' => App\GraphQL\Mutation\BrnstatusCreateMutation::class, 
                'BrnStatusUpdate' => App\GraphQL\Mutation\BrnstatusUpdateMutation::class,
                'BrnStatusDelete' => App\GraphQL\Mutation\BrnstatusDeleteMutation::class, 

                //BrnRepair
                //Branch     
                'BrnRepairCreate' => App\GraphQL\Mutation\BrnrepairCreateMutation::class,    

                //Office  
                'BrnRepairAccept' => App\GraphQL\Mutation\BrnrepairAcceptMutation::class,    
                'BrnRepairDelete' => App\GraphQL\Mutation\BrnrepairDeleteMutation::class,          
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
        App\GraphQL\Type\BrnchoiceType::class,
        App\GraphQL\Type\BrnstatusType::class,
        App\GraphQL\Type\BrnrepairType::class,        
    ],

    'error_formatter' => [\Folklore\GraphQL\GraphQL::class, 'formatError'],

    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false
    ]
];
