<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnchoice;

class BrnchoiceDeleteMutation extends Mutation
{
    protected $attributes = [
        'name' => 'BrnchoiceDeleteMutation',
        'description' => 'mutation delete brnchoice'
    ];

    public function type()
    {
        return GraphQL::type('Brnchoice');
    }

    public function args()
    {
        return [
            'id'    => ['type' => Type::nonNull(Type::int())],         
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $choice = Brnchoice::find($args['id']);
        
        if(!$choice)
        {
            return null;
        }

        $choice->delete();

        return $choice;
    }

}
