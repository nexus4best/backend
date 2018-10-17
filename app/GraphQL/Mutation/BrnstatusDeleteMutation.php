<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnstatus;

class BrnstatusDeleteMutation extends Mutation
{
    protected $attributes = [
        'name' => 'BrnstatusDeleteMutation',
        'description' => 'mutation delete brnstatus'
    ];

    public function type()
    {
        return GraphQL::type('Brnstatus');
    }

    public function args()
    {
        return [
            'id'    => ['type' => Type::nonNull(Type::int())], 
            'DeleteCause'    => ['type' => Type::nonNull(Type::string())],         
        ];
    }

    public function rules()
    {
        return [
            'DeleteCause'  => ['required'],
        ];
    }    

    public function resolve($root, $args, $context, ResolveInfo $info)
    {

        $brn = Brnstatus::find($args['id']);
        
        if(!$brn)
        {
            return null;
        }

        $brn->delete();

        return $brn;
    }

}
