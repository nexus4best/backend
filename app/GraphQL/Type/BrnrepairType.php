<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class BrnrepairType extends BaseType
{
    protected $attributes = [
        'name' => 'Brnrepair',
        'description' => 'type brnrepair'
    ];

    public function fields()
    {
        return [
            //create
        	'id' 	=> ['type' => Type::nonNull(Type::int())],
        	'BrnCode' 	=> ['type' => Type::nonNull(Type::string())],
        	'BrnStatus' => ['type' => Type::nonNull(Type::string())],
            'BrnRepair'   => ['type' => Type::nonNull(Type::string())],
            'BrnPos' => ['type' => Type::nonNull(Type::string())],
            'BrnBrand'   => ['type' => Type::string()],
            'BrnModel' => ['type' => Type::string()],
            'BrnSerial'   => ['type' => Type::string()],
            'BrnCause' => ['type' => Type::nonNull(Type::string())],  
            'BrnUser' => ['type' => Type::nonNull(Type::string())],
            'created_at' => ['type' => Type::string()],
            'updated_at' => ['type' => Type::string()],
            //delete
            'DeleteCause'   => ['type' => Type::string()],
            'DeleteBy' => ['type' => Type::string()],
            'delete_date'   => ['type' => Type::string()],
            //Accept
            'AcceptBy' => ['type' => Type::string()],
            'accept_date'   => ['type' => Type::string()],    
            'branch'      => ['type' => GraphQL::type('Brnzone')],         
        ];
    }

    protected function resolveCreatedAtField($root, $args)
    {
        return (string) $root->created_at;
    }

    protected function resolveUpdatedAtField($root, $args)
    {
        return (string) $root->updated_at;
    }

    protected function resolveDeleteDateField($root, $args)
    {
        return (string) $root->delete_date;
    } 

    protected function resolveAcceptDateField($root, $args)
    {
        return (string) $root->accept_date;
    }               
}
