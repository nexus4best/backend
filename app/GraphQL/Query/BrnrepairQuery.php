<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnrepair;

class BrnrepairQuery extends Query
{
    protected $attributes = [
        'name' => 'BrnrepairQuery',
        'description' => 'query brnrepair'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Brnrepair'));
    }

    public function args()
    {
        return [
            'id'    => ['name' => 'filterId', 'type' => Type::int()],
            'BrnCode'    => ['name' => 'filterBrnCode', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {

        if(isset($args['filterId']))
        {
            return Brnrepair::where('id', $args['filterId'])->get();;
        }    

        if(isset($args['filterBrnCode']))
        {
            return Brnrepair::where('BrnCode', $args['filterBrnCode'])->orderBy('id', 'DESC')->get();
        }             

        return Brnrepair::orderBy('id', 'DESC')->get();
    }
}
