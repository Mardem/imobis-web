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
}
