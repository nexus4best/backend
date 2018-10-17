<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class BrnstatusType extends BaseType
{
    protected $attributes = [
        'name' => 'Brnstatus',
        'description' => 'type brnstatus'
    ];

    public function fields()
    {
        return [
        	'id' 	=> ['type' => Type::nonNull(Type::int())],
        	'name' 	=> ['type' => Type::nonNull(Type::string())],
            'service'  => ['type' => Type::nonNull(Type::string())],
        ];
    }
}
