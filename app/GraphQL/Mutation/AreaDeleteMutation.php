<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Area;

class AreaDeleteMutation extends Mutation
{
    protected $attributes = [
        'name' => 'AreaDeleteMutation',
        'description' => 'mutation delete areas'
    ];

    public function type()
    {
        return GraphQL::type('Area');
    }

    public function args()
    {
        return [
            'AreaId'    => ['type' => Type::nonNull(Type::int())],         
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $area = Area::find($args['AreaId']);
        
        if(!$area)
        {
            return null;
        }

        $area->delete();

        return $area;
    }

}
