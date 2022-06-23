<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class LeadFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = ['client', 'expenses'];

    public function responsible($id)
    {
        if ($id != '') {
            return $this->where('responsable_id', '=', $id);
        }
        return $this;
    }

    public function stage($stage)
    {
        return $this->where('stage', '=', $stage);
    }
}
