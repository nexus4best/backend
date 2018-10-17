<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnrepair;

class BrnrepairDeleteMutation extends Mutation
{
    protected $attributes = [
        'name' => 'BrnrepairDeleteMutation',
        'description' => 'mutation delete brnrepair'
    ];

    public function type()
    {
        return GraphQL::type('Brnrepair');
    }

    public function args()
    {
        return [
            'id'    => ['type' => Type::nonNull(Type::int())],
            'DeleteCause' => ['type' => Type::string()],            
        ];
    }

    public function rules()
    {
        return [
            'DeleteCause' => ['required'],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $repair = Brnrepair::find($args['id']);
        
        if(!$repair)
        {
            return null;
        }

        $repair->DeleteBy = 'THANEE';
        $repair->BrnStatus = 'ลบ';
        $repair->delete_date = Date('Y-m-d H:i:s');
        $repair->DeleteCause = $args['DeleteCause'];
        $repair->save();

        return $repair;
    }

}
