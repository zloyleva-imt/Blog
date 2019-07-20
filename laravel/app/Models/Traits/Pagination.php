<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;

trait Pagination {

    /**
     * @param Builder $query
     * @param array $params
     * @return LengthAwarePaginator
     */
    public function addPagination(Builder $query,array $params):LengthAwarePaginator
    {
        return $query->paginate(config('config.perPage', 15))
            ->appends($params);
    }
}