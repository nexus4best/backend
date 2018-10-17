<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnstatus;

class BrnstatusCreateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'BrnstatusCreateMutation',
        'description' => 'mutation create brnstatus'
    ];

    public function type()
    {
        return GraphQL::type('Brnstatus');
    }

    public function args()
    {
        return [
            'name'  => ['type' => Type::nonNull(Type::string())],
            'service'  => ['type' => Type::nonNull(Type::string())],
        ];
    }

    public function rules()
    {
        return [
            'name'  => ['required'],
            'service'  => ['required'],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $brn = Brnstatus::create($args);
        
        if(!$brn)
        {
            return null;
        }

        return $brn;
    }

}
