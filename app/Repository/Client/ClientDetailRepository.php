<?php


namespace App\Repository\Client;


use App\Models\ClientDetail;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ClientDetailRepository extends BaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new ClientDetail();
    }

    protected function model(): Model
    {
        return $this->model;
    }
}
