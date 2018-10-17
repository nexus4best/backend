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
            'BrnPrv'     => ['name' => 'filterBrnPrv', 'type' => Type::string()],
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

        if(isset($args['filterBrnPrv']) 
            && isset($args['filterBrnName']) 
                && isset($args['filterCtsId'])
                    && isset($args['filterAreaId']))
        {
            return Brnzone::where('BrnPrv', 'like', '%'.$args['filterBrnPrv'].'%')
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

        //1/4
        if(isset($args['filterBrnCode']) 
            && isset($args['filterBrnName']) 
                && isset($args['filterBrnPrv']))
        {
            return Brnzone::where('BrnCode', 'like', '%'.$args['filterBrnCode'].'%')
                          ->where('BrnName', 'like', '%'.$args['filterBrnName'].'%')
                          ->where('BrnPrv', 'like', '%'.$args['filterBrnPrv'].'%')
                          ->get();
        }  

        //2/4
        if(isset($args['filterBrnCode']) 
            && isset($args['filterCtsId']) 
                && isset($args['filterBrnPrv']))
        {
            return Brnzone::where('BrnCode', 'like', '%'.$args['filterBrnCode'].'%')
                          ->where('CtsId', $args['filterCtsId'])
                          ->where('BrnPrv', 'like', '%'.$args['filterBrnPrv'].'%')
                          ->get();
        } 

        //3/4
        if(isset($args['filterBrnName']) 
            && isset($args['filterCtsId']) 
                && isset($args['filterBrnPrv']))
        {
            return Brnzone::where('BrnName', 'like', '%'.$args['filterBrnName'].'%')
                          ->where('CtsId', $args['filterCtsId'])
                          ->where('BrnPrv', 'like', '%'.$args['filterBrnPrv'].'%')
                          ->get();
        }   

        //4/4
        if(isset($args['filterBrnName']) 
            && isset($args['filterAreaId']) 
                && isset($args['filterBrnPrv']))
        {
            return Brnzone::where('BrnName', 'like', '%'.$args['filterBrnName'].'%')
                          ->where('AreaId', $args['filterAreaId'])
                          ->where('BrnPrv', 'like', '%'.$args['filterBrnPrv'].'%')
                          ->get();
        }    

        //4/4
        if(isset($args['filterCtsId']) 
            && isset($args['filterAreaId']) 
                && isset($args['filterBrnPrv']))
        {
            return Brnzone::where('CtsId', $args['filterCtsId'])
                          ->where('AreaId', $args['filterAreaId'])
                          ->where('BrnPrv', 'like', '%'.$args['filterBrnPrv'].'%')
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

        if(isset($args['filterAreaId']) && isset($args['filterBrnPrv']))
        {
            return Brnzone::where('AreaId', $args['filterAreaId'])
                          ->where('BrnPrv', 'like', '%'.$args['filterBrnPrv'].'%')
                          ->get();
        } 

        if(isset($args['filterCtsId']) && isset($args['filterBrnPrv']))
        {
            return Brnzone::where('CtsId', $args['filterCtsId'])
                          ->where('BrnPrv', 'like', '%'.$args['filterBrnPrv'].'%')
                          ->get();
        }         

        if(isset($args['filterBrnName']) && isset($args['filterBrnPrv']))
        {
            return Brnzone::where('BrnName', 'like', '%'.$args['filterBrnName'].'%')
                          ->where('BrnPrv', 'like', '%'.$args['filterBrnPrv'].'%')
                          ->get();
        } 

        if(isset($args['filterBrnCode']) && isset($args['filterBrnPrv']))
        {
            return Brnzone::where('BrnCode', 'like', '%'.$args['filterBrnCode'].'%')
                          ->where('BrnPrv', 'like', '%'.$args['filterBrnPrv'].'%')
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
        if(isset($args['filterBrnPrv']))
        {

            return Brnzone::where('BrnPrv', 'like', '%'.$args['filterBrnPrv'].'%')->get();
        }

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

    }
}
