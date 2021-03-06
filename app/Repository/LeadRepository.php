<?php

namespace App\Repository;


use App\Models\Lead;
use App\Models\LeadExpense;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class LeadRepository extends BaseRepository
{

    public $model;

    public function __construct()
    {
        $this->model = new Lead();
    }

    protected function model(): Model
    {
        return $this->model;
    }

    public function updateStage($id, $stage)
    {
        try {
            $this->model()->find($id)->update(['stage' => $stage]);
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function addExpense(Request $request)
    {
        try {
            LeadExpense::create($request->all());
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
