<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Area;

class AreaUpdateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'AreaUpdateMutation',
        'description' => 'mutation update areas'
    ];

    public function type()
    {
        return GraphQL::type('Area');
    }

    public function args()
    {
        return [
            'AreaId'    => ['type' => Type::nonNull(Type::int())],
            'AreaName'  => ['type' => Type::nonNull(Type::string())],
            'AreaPhone' => ['type' => Type::nonNull(Type::string())],
        ];
    }

    public function rules()
    {
        return [
            'AreaId'    => ['required'],
            'AreaName'  => ['required'],
            'AreaPhone' => ['required'],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $area = Area::find($args['AreaId']);
        
        if(!$area)
        {
            return null;
        }

        $area->AreaName = $args['AreaName'];
        $area->AreaPhone = $args['AreaPhone'];
        $area->save();

        return $area;
    }

}
