<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Province;

class ProvinceQuery extends Query
{
    protected $attributes = [
        'name' => 'ProvinceQuery',
        'description' => 'query province'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Province'));
    }

    public function args()
    {
        return [
            'PrvCode'    => ['name' => 'filterPrvCode', 'type' => Type::string()],
            'PrvName'  => ['name' => 'filterPrvName', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {        

        return Province::all();
    }
}
