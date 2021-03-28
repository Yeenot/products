<?php

namespace App\Traits;

trait ExtendedModel
{
    /**
     * Search
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $columns
     * @param string $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $columns, $value)
    {
        return $query->where(function($query) use ($columns, $value) {
            foreach ($columns as $column) {
                $query = $query->when(!empty($value), function($query) use ($column, $value) {
                    return $query->orWhere($column, 'LIKE', '%'.$value.'%');
                });
            }
            return $query;
        });
    }

    /**
     * Paginate
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $page
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMyPaginate($query, $offset, $limit)
    {
        return $query->offset($offset)->limit($limit);
    }
}