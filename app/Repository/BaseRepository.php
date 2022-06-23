<?php


namespace App\Repository;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class BaseRepository
{
    abstract protected function model(): Model;
    abstract protected function relationships(): array;

    public function findById($id)
    {
        return $this->model()->with($this->relationships())->find($id);
    }

    public function list()
    {
        return $this->model()->orderBy('id', 'desc')->paginate();
    }

    public function update(Request $request, $id)
    {
        try {
            $this->model()->find($id)->update($request->all());
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $this->model()->find($id)->delete();
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function store(Request $request): bool
    {
        try {
            $this->model()->create($request->all());
            return true;
        } catch (\Exception $exception) {
            \Log::info($exception->getMessage());
            return false;
        }
    }
}
