<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class ProvinceType extends BaseType
{
    protected $attributes = [
        'name' => 'Province',
        'description' => 'type provinces'
    ];

    public function fields()
    {
        return [
        	'PrvCode' 	=> ['type' => Type::nonNull(Type::string())],
        	'PrvName' 	=> ['type' => Type::nonNull(Type::string())],
        	'PrvRgn' => ['type' => Type::nonNull(Type::int())],
        ];
    }
}
