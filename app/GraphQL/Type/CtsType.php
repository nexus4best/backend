<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class CtsType extends BaseType
{
    protected $attributes = [
        'name' => 'Cts',
        'description' => 'type cts'
    ];

    public function fields()
    {
        return [
        	'CtsId'    => ['type' => Type::nonNull(Type::int())],
        	'CtsName'  => ['type' => Type::nonNull(Type::string())],
        ];
    }
}
