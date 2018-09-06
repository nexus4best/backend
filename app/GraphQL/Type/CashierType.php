<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class CashierType extends BaseType
{
    protected $attributes = [
        'name' => 'Cashier',
        'description' => 'type cashiers'
    ];

    public function fields()
    {
        return [
        	'CshIP' 	             => ['type' => Type::nonNull(Type::string())],
        	'CshBranch' 	         => ['type' => Type::nonNull(Type::string())],
        	'CshDatabaseServerAlone' => ['type' => Type::nonNull(Type::string())],
            'CshName'                => ['type' => Type::nonNull(Type::string())],
        ];
    }
}
