<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Brnchoice;

class BrnchoiceQuery extends Query
{
    protected $attributes = [
        'name' => 'BrnchoiceQuery',
        'description' => 'query brnchoice'
    ];

    public function type()
    {
        //return GraphQL::pagination(GraphQL::type('Cashier'));
        return Type::listOf(GraphQL::type('Brnchoice'));
    }

    public function args()
    {
        return [
            'id'   => ['name' => 'filterId', 'type' => Type::int()],
            'name' => ['name' => 'filterName', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {

        if(isset($args['filterId']) && isset($args['filterName']))
        {
            return Brnchoice::where('id', $args['filterId'])
                    ->where('name', 'like', '%'.$args['filterName'].'%')
                    ->orderBy('id', 'ASC')
                    ->get();
        }

        if(isset($args['filterId']))
        {
            return Brnchoice::where('id', $args['filterId'])
                ->orderBy('id', 'ASC')
                ->get();            
        }

        if(isset($args['filterName']))
        {
            return Brnchoice::where('name', 'like', '%'.$args['filterName'].'%')
                ->orderBy('id', 'ASC')
                ->get();
        }        

        return Brnchoice::orderBy('id', 'ASC')->get();
    }
}
