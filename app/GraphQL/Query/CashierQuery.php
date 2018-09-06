<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Cashier;

class CashierQuery extends Query
{
    protected $attributes = [
        'name' => 'CashierQuery',
        'description' => 'query cashiers'
    ];

    public function type()
    {
        return GraphQL::pagination(GraphQL::type('Cashier'));
        //return Type::listOf(GraphQL::type('Cashier'));
    }

    public function args()
    {
        return [
            'CshIP'     => ['name' => 'filterCshIP', 'type' => Type::string()],
            'CshBranch' => ['name' => 'filterCshBranch', 'type' => Type::string()],
            'page'      => ['name' => 'page', 'type' => Type::int()],
            'limit'     => ['name' => 'limit', 'type' => Type::int()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {

        if(isset($args['filterCshIP']) && isset($args['filterCshBranch']))
        {
            return Cashier::where('CshBranch', 'like', 'S%')
                    ->where('CshIP', 'like', '%'.$args['filterCshIP'].'%')
                    ->where('CshBranch', 'like', '%'.$args['filterCshBranch'].'%')
                    ->orderBy('CshBranch')
                    ->paginate($args['limit'] ?? 20, ['*'], 'page', $args['page'] ?? 0 );
        }

        if(isset($args['filterCshIP']))
        {
            return Cashier::where('CshBranch', 'like', 'S%')
                    ->where('CshIP', 'like', '%'.$args['filterCshIP'].'%')
                    ->orderBy('CshBranch')
                    ->paginate($args['limit'] ?? 20, ['*'], 'page', $args['page'] ?? 0 );
        }

        if(isset($args['filterCshBranch']))
        {
            return Cashier::where('CshBranch', 'like', 'S%')
                    ->where('CshBranch', 'like', '%'.$args['filterCshBranch'].'%')
                    ->orderBy('CshBranch')
                    ->paginate($args['limit'] ?? 20, ['*'], 'page', $args['page'] ?? 0 );
        }        

        return Cashier::where('CshBranch', 'like', 'S%')
                 ->orderBy('CshBranch')
                 ->paginate($args['limit'] ?? 20, ['*'], 'page', $args['page'] ?? 0 );
    }
}
