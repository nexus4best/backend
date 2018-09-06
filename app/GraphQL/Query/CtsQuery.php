<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Cts;

class CtsQuery extends Query
{
    protected $attributes = [
        'name' => 'CtsQuery',
        'description' => 'query cts'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Cts'));
    }

    public function args()
    {
        return [
            'CtsId'    => ['name' => 'filterCtsId', 'type' => Type::int()],
            'CtsName'  => ['name' => 'filterCtsName', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {

        if(isset($args['filterCtsId']) && isset($args['filterCtsName']))
        {
            return Cts::where('CtsId', $args['filterCtsId'])
                    ->where('CtsName', 'like', '%'.$args['filterCtsName'].'%')
                    ->get();
        }

        if(isset($args['filterCtsId']))
        {
            return Cts::where('CtsId', $args['filterCtsId'])->get();;
        }

        if(isset($args['filterCtsName']))
        {
            return Cts::where('CtsName', 'like', '%'.$args['filterCtsName'].'%')->get();;
        }        

        return Cts::all();
    }
}
