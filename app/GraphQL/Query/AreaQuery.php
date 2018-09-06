<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Area;

class AreaQuery extends Query
{
    protected $attributes = [
        'name' => 'AreaQuery',
        'description' => 'query areas'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Area'));
    }

    public function args()
    {
        return [
            'AreaId'    => ['name' => 'filterAreaId', 'type' => Type::int()],
            'AreaName'  => ['name' => 'filterAreaName', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {

        if(isset($args['filterAreaId']) && isset($args['filterAreaName']))
        {
            return Area::where('AreaId', $args['filterAreaId'])
                    ->where('AreaName', 'like', '%'.$args['filterAreaName'].'%')
                    ->get();
        }

        if(isset($args['filterAreaId']))
        {
            return Area::where('AreaId', $args['filterAreaId'])->get();;
        }

        if(isset($args['filterAreaName']))
        {
            return Area::where('AreaName', 'like', '%'.$args['filterAreaName'].'%')->get();;
        }        

        return Area::all();
    }
}
