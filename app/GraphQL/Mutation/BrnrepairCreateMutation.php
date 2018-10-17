<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnrepair;

class BrnrepairCreateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'BrnrepairCreateMutation',
        'description' => 'mutation create brnrepair'
    ];

    public function type()
    {
        return GraphQL::type('Brnrepair');
    }

    public function args()
    {
        return [
            'BrnCode'   => ['type' => Type::nonNull(Type::string())],
            'BrnStatus' => ['type' => Type::nonNull(Type::string())],
            'BrnRepair'   => ['type' => Type::nonNull(Type::string())],
            'BrnPos' => ['type' => Type::nonNull(Type::string())],
            'BrnBrand'   => ['type' => Type::string()],
            'BrnModel' => ['type' => Type::string()],
            'BrnSerial'   => ['type' => Type::string()],
            'BrnCause' => ['type' => Type::nonNull(Type::string())],  
            'BrnUser' => ['type' => Type::nonNull(Type::string())],
        ];
    }

    public function rules()
    {
        return [
            'BrnCode'    => ['required'],
            'BrnStatus'  => ['required'],
            'BrnRepair' => ['required'],
            'BrnPos'    => ['required'],
            'BrnCause' => ['required'],  
            'BrnUser' => ['required'],                        
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $reapir = Brnrepair::create($args);
        
        if(!$reapir)
        {
            return null;
        }

        return $reapir;
    }

}
