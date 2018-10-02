<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class BrnzoneType extends BaseType
{
    protected $attributes = [
        'name' => 'Brnzone',
        'description' => 'type brnzones'
    ];

    public function fields()
    {
        return [
        	'BrnCode' 	=> ['type' => Type::nonNull(Type::string())],
        	'BrnName' 	=> ['type' => Type::nonNull(Type::string())],
            'BrnPrv'    => ['type' => Type::nonNull(Type::string())],
        	'CtsId'     => ['type' => Type::nonNull(Type::string())],
            'AreaId'    => ['type' => Type::nonNull(Type::string())],
            'area'      => ['type' => GraphQL::type('Area')],  
            'cts'       => ['type' => GraphQL::type('Cts')],
            'province'  => ['type' => GraphQL::type('Province')],
            'cashier'   => ['type' => Type::listOf(GraphQL::type('Cashier'))],       
        ];
    }

/*    public function resolveAreaField($root, $args)
    {
        if (isset($args['AreaId'])) {
            return  $root->area->where('AreaId', $args['AreaId']);
        }

        return $root->area;
    }*/

}
