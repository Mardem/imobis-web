<?php


namespace App\Repository\Client;


use App\Models\Client;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClientRepository extends BaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Client();
    }

    protected function model(): Model
    {
        return $this->model;
    }

    public function myClients($userId)
    {
        try {
            return [
                'status' => true,
                'data' => $this->model->where('colab_id', '=', $userId)->get()
            ];
        } catch (\Exception $exception) {
            return [
                'status' => true,
                'data' => $this->model->where('colab_id', '=', $userId)->get()
            ];
        }
    }

    protected function relationships(): array
    {
        return [];
    }
}
