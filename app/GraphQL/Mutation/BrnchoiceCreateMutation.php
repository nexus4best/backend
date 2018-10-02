<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnchoice;

class BrnchoiceCreateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'BrnchoiceCreateMutation',
        'description' => 'mutation create brnchoice'
    ];

    public function type()
    {
        return GraphQL::type('Brnchoice');
    }

    public function args()
    {
        return [
            'name'    => ['type' => Type::nonNull(Type::string())],
        ];
    }

    public function rules()
    {
        return [
            'name'  => ['required'],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $brnChoice = Brnchoice::create($args);
        
        if(!$brnChoice)
        {
            return null;
        }

        return $brnChoice;
    }

}
