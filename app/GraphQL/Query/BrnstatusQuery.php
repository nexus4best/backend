<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnstatus;

class BrnstatusQuery extends Query
{
    protected $attributes = [
        'name' => 'BrnstatusQuery',
        'description' => 'query Brnstatus'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Brnstatus'));
    }

    public function args()
    {
        return [
            'id'    => ['name' => 'filterId', 'type' => Type::int()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {

        if(isset($args['filterId']) )
        {
            return Brnstatus::where('id', $args['filterId'])->get();
        }
       

        return Brnstatus::all();
    }
}
