<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnrepair;

class BrnRepairCtsQuery extends Query
{
    protected $attributes = [
        'name' => 'BrnRepairCtsQuery',
        'description' => 'query BrnRepairCts'
    ];

    public function type()
    {
        return GraphQL::pagination(GraphQL::type('Brnrepair'));
        //return Type::listOf(GraphQL::type('Brnrepair'));
    }

    public function args()
    {
        return [
            'page'      => ['name' => 'page', 'type' => Type::int()],
            'limit'     => ['name' => 'limit', 'type' => Type::int()],
            'created_at'     => ['name' => 'created_at', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    { 

        if(isset($args['created_at']))
        {
            return Brnrepair::where('created_at', 'like', $args['created_at'].' %')
                    ->where('BrnPos', '<>', 'CCTV')
                    ->where('BrnPos', '<>', 'ADSL')
                    ->orderBy('id', 'DESC')
                    ->paginate($args['limit'] ?? 15, ['*'], 'page', $args['page'] ?? 0 );
        }          


            return Brnrepair::where('BrnPos', '<>', 'CCTV')
                    ->where('BrnPos', '<>', 'ADSL')
                    ->orderBy('id', 'DESC')
                    ->paginate($args['limit'] ?? 15, ['*'], 'page', $args['page'] ?? 0 );
           

    }
}
