<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnzone;

class BrnzoneQuery extends Query
{
    protected $attributes = [
        'name' => 'BrnzoneQuery',
        'description' => 'query brnzones'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Brnzone'));
    }

    public function args()
    {
        return [
            'BrnCode'     => ['name' => 'filterBrnCode', 'type' => Type::string()],
            'BrnName'     => ['name' => 'filterBrnName', 'type' => Type::string()],
            'CtsId'     => ['name' => 'filterCtsId', 'type' => Type::string()],
            'AreaId'     => ['name' => 'filterAreaId', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if(isset($args['filterBrnCode']) 
            && isset($args['filterBrnName']) 
                && isset($args['filterCtsId'])
                    && isset($args['filterAreaId']))
        {
            return Brnzone::where('BrnCode', 'like', '%'.$args['filterBrnCode'].'%')
                          ->where('BrnName', 'like', '%'.$args['filterBrnName'].'%')
                          ->where('CtsId', $args['filterCtsId'])
                          ->where('AreaId', $args['filterAreaId'])
                          ->get();
        }

        if(isset($args['filterBrnCode']) 
            && isset($args['filterCtsId']) 
                && isset($args['filterAreaId']))
        {
            return Brnzone::where('BrnCode', 'like', '%'.$args['filterBrnCode'].'%')
                          ->where('CtsId', $args['filterCtsId'])
                          ->where('AreaId', $args['filterAreaId'])
                          ->get();
        } 

        if(isset($args['filterBrnName']) 
            && isset($args['filterCtsId']) 
                && isset($args['filterAreaId']))
        {
            return Brnzone::where('BrnName', 'like', '%'.$args['filterBrnName'].'%')
                          ->where('CtsId', $args['filterCtsId'])
                          ->where('AreaId', $args['filterAreaId'])
                          ->get();
        }         

        if(isset($args['filterBrnCode']) 
            && isset($args['filterBrnName']) 
                && isset($args['filterAreaId']))
        {
            return Brnzone::where('BrnCode', 'like', '%'.$args['filterBrnCode'].'%')
                          ->where('BrnName', 'like', '%'.$args['filterBrnName'].'%')
                          ->where('AreaId', $args['filterAreaId'])
                          ->get();
        } 

        if(isset($args['filterBrnCode']) 
            && isset($args['filterBrnName']) 
                && isset($args['filterCtsId']))
        {
            return Brnzone::where('BrnCode', 'like', '%'.$args['filterBrnCode'].'%')
                          ->where('BrnName', 'like', '%'.$args['filterBrnName'].'%')
                          ->where('CtsId', $args['filterCtsId'])
                          ->get();
        } 


        if(isset($args['filterCtsId']) && isset($args['filterAreaId']))
        {
            return Brnzone::where('CtsId', $args['filterCtsId'])
                          ->where('AreaId', $args['filterAreaId'])
                          ->get();
        } 


        if(isset($args['filterBrnName']) && isset($args['filterAreaId']))
        {
            return Brnzone::where('BrnName', 'like', '%'.$args['filterBrnName'].'%')
                          ->where('AreaId', $args['filterAreaId'])
                          ->get();
        } 

        if(isset($args['filterBrnName']) && isset($args['filterCtsId']))
        {
            return Brnzone::where('BrnName', 'like', '%'.$args['filterBrnName'].'%')
                          ->where('CtsId', $args['filterCtsId'])
                          ->get();
        } 


        if(isset($args['filterBrnCode']) && isset($args['filterAreaId']))
        {
            return Brnzone::where('BrnCode', 'like', '%'.$args['filterBrnCode'].'%')
                          ->where('AreaId', $args['filterAreaId'])
                          ->get();
        }  

        if(isset($args['filterBrnCode']) && isset($args['filterCtsId']))
        {
            return Brnzone::where('BrnCode', 'like', '%'.$args['filterBrnCode'].'%')
                          ->where('CtsId', $args['filterCtsId'])
                          ->get();
        }    

        if(isset($args['filterBrnCode']) && isset($args['filterBrnName']))
        {
            return Brnzone::where('BrnCode', 'like', '%'.$args['filterBrnCode'].'%')
                          ->where('BrnName', 'like', '%'.$args['filterBrnName'].'%')
                          ->get();
        }                                  

        // 1
        if(isset($args['filterAreaId']))
        {
            return Brnzone::where('AreaId', $args['filterAreaId'])->get();
        } 

        if(isset($args['filterCtsId']))
        {
            return Brnzone::where('CtsId', $args['filterCtsId'])->get();
        } 

        if(isset($args['filterBrnName']))
        {
            return Brnzone::where('BrnName', 'like', '%'.$args['filterBrnName'].'%')->get();
        }          

        if(isset($args['filterBrnCode']))
        {
            return Brnzone::where('BrnCode', 'like', '%'.$args['filterBrnCode'].'%')->get();
        }                                

        return Brnzone::all();

/*        if(isset($args['filterBrnCode']) && isset($args['filterCtsId']) && isset($args['filterAreaId']))
        {
            return Brnzone::where('BrnCode', $args['filterBrnCode'])
                    ->where('CtsId', 'like', $args['filterCtsId'])
                    ->where('AreaId', $args['filterAreaId'])
                    ->first();
        }*/

/*        if(isset($args['filterCshIP']))
        {
            return Cashier::where('CshBranch', 'like', 'S%')
                    ->where('CshIP', 'like', '%'.$args['filterCshIP'].'%')
                    ->orderBy('CshBranch')
                    ->paginate($args['limit'] ?? 20, ['*'], 'page', $args['page'] ?? 0 );
        }

        if(isset($args['filterCshBranch']))
        {
            return Cashier::where('CshBranch', 'like', 'S%')
                    ->where('CshBranch', 'like', '%'.$args['filterCshBranch'].'%')
                    ->orderBy('CshBranch')
                    ->paginate($args['limit'] ?? 20, ['*'], 'page', $args['page'] ?? 0 );
        }        

        return Cashier::where('CshBranch', 'like', 'S%')
                 ->orderBy('CshBranch')
                 ->paginate($args['limit'] ?? 20, ['*'], 'page', $args['page'] ?? 0 );*/
    }
}
