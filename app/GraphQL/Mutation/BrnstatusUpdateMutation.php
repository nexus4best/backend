<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnstatus;

class BrnstatusUpdateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'BrnstatusUpdateMutation',
        'description' => 'mutation update brnstatus'
    ];

    public function type()
    {
        return GraphQL::type('Brnstatus');
    }

    public function args()
    {
        return [
            'id'    => ['type' => Type::nonNull(Type::int())],
            'name'  => ['type' => Type::nonNull(Type::string())],
            'service' => ['type' => Type::nonNull(Type::string())],
        ];
    }

    public function rules()
    {
        return [
            'name'  => ['required'],
            'service' => ['required'],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $brn = Brnstatus::find($args['id']);
        
        if(!$brn)
        {
            return null;
        }

        $brn->name = $args['name'];
        $brn->service = $args['service'];
        $brn->save();

        return $brn;
    }

}
