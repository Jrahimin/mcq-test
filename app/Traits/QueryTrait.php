<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait QueryTrait
{
    protected function likeQueryFilter($request, $query, array $likeFilterList)
    {
        foreach ($likeFilterList as $likeFilter)
        {
            if ($request->filled($likeFilter)) {
                $query->where($likeFilter, 'like', '%' . $request->{$likeFilter} . '%');
            }
        }

        return $query;
    }

    protected function whereQueryFilter($request, $query, array $whereFilterList)
    {
        foreach ($whereFilterList as $whereFilter)
        {
            if ($request->filled($whereFilter)) {
                $query->where($whereFilter, $request->{$whereFilter});
            }
        }
        return $query;
    }

    protected function filterDateBetween($request, $query, $column='created_at')
    {
        if($request->filled('from_date')){
            $query->whereDate($column, '>=', $request->from_date);
        }
        if($request->filled('to_date')){
            $query->whereDate($column, '<=', $request->to_date);
        }

        return $query;
    }

    protected function filterWhereHasRelation($query, Request $request, $relation, $column)
    {
        if(!$request->{$column})
            return $query;

        return $query->whereHas($relation, function ($q) use ($request, $column) {
            $q->where($column, $request->{$column});
        });
    }
}
