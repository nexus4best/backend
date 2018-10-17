<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class AreaType extends BaseType
{
    protected $attributes = [
        'name' => 'Area',
        'description' => 'type areas'
    ];

    public function fields()
    {
        return [
        	'AreaId' 	=> ['type' => Type::nonNull(Type::string())],
        	'AreaName' 	=> ['type' => Type::nonNull(Type::string())],
        	'AreaPhone' => ['type' => Type::nonNull(Type::string())],
        ];
    }
}
