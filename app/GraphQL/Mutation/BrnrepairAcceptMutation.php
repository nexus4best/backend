<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnrepair;

class BrnrepairAcceptMutation extends Mutation
{
    protected $attributes = [
        'name' => 'BrnrepairAcceptMutation',
        'description' => 'mutation accept brnrepair'
    ];

    public function type()
    {
        return GraphQL::type('Brnrepair');
    }

    public function args()
    {
        return [
            'id'    => ['type' => Type::nonNull(Type::int())],
            //'BrnStatus' => ['type' => Type::nonNull(Type::string())],         
        ];
    }

    public function rules()
    {
        return [
            //'BrnStatus' => ['required'],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $repair = Brnrepair::find($args['id']);
        
        if(!$repair)
        {
            return null;
        }

        $repair->AcceptBy = 'KHAMSING';
        $repair->BrnStatus = 'รับเรื่อง';
        $repair->accept_date = Date('Y-m-d H:i:s');
        $repair->save();

        return $repair;
    }

}
