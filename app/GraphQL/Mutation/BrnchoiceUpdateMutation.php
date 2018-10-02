<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnchoice;

class BrnchoiceUpdateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'BrnchoiceUpdateMutation',
        'description' => 'mutation update brnchoice'
    ];

    public function type()
    {
        return GraphQL::type('Brnchoice');
    }

    public function args()
    {
        return [
            'id'    => ['type' => Type::nonNull(Type::int())],
            'name'  => ['type' => Type::nonNull(Type::string())],
        ];
    }

    public function rules()
    {
        return [
            'id'    => ['required'],
            'name'  => ['required'],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $choice = Brnchoice::find($args['id']);
        
        if(!$choice)
        {
            return null;
        }

        $choice->name = $args['name'];
        $choice->save();

        return $choice;
    }

}
