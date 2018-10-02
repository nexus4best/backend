<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class BrnchoiceType extends BaseType
{
    protected $attributes = [
        'name' => 'Brnchoice',
        'description' => 'type brnchoice to repair'
    ];

    public function fields()
    {
        return [
        	'id'   => ['type' => Type::nonNull(Type::int())],
        	'name' => ['type' => Type::nonNull(Type::string())],
        ];
    }
}
