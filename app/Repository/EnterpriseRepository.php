<?php

namespace App\Repository;


use App\Models\Enterprise;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EnterpriseRepository extends BaseRepository
{
    public $model;

    public function __construct()
    {
        $this->model = new Enterprise();
    }

    protected function model(): Model
    {
        return $this->model;
    }

    protected function relationships(): array
    {
        return [];
    }
}
