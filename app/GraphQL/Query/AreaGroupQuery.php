<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnzone;

class AreaGroupQuery extends Query
{
    protected $attributes = [
        'name' => 'AreaGroupQuery',
        'description' => 'query brnzones'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Brnzone'));
    }

    public function args()
    {
        return [
            'CtsId'     => ['name' => 'filterCtsId', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {

        if(isset($args['filterCtsId']))
        {
            // $aaa = DB::table('brnzones')
            //     ->groupBy('AreaId')
            //     ->having('CtsId', $args['filterCtsId'])
            //     ->get();   


            return Brnzone::select('AreaId')
                          ->where('CtsId', $args['filterCtsId'])
                          ->groupBy('AreaId')
                          ->get();
        }         
                               

        return Brnzone::select('AreaId')->groupBy('AreaId')->get();

    }
}
