<?php namespace HeppyKarlsson\Subtype;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SubtypeScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if(! property_exists($model, 'subtypeColumn')) {
            throw new SubtypeException('To use the Subtype trait you need to declare the property "subtypeColumn"');
        }

        if(! property_exists($model, 'subtypeValue')) {
            throw new SubtypeException('To use the Subtype trait you need to declare the property "subtypeValue"');
        }

        $column = $model->subtypeColumn;
        $value = $model->subtypeValue;

        $builder->where($column, $value);
    }

    /**
     * Remove the scope from the given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function remove(Builder $builder, Model $model)
    {
        $column = $model->subtypeColumn;
        $query = $builder->getQuery();

        $query->wheres = collect($query->wheres)->reject(function ($where) use ($column) {
            return $this->isRemovedConstraint($where, $column);
        })->values()->all();
    }

    protected function isRemovedConstraint($where, $column)
    {
        dd($where);
        return $where['type'] == 'Null' && $where['column'] == $column;
    }


}