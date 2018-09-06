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
            //'CtsId'     => ['name' => 'filterCtsId', 'type' => Type::int()],
            //'AreaId'     => ['name' => 'filterAreaId', 'type' => Type::int()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {

        if(isset($args['filterBrnCode']))
        {
            return Brnzone::where('BrnCode', $args['filterBrnCode'])->get();
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
