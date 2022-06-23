<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Repository\Client\ClientRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new ClientRepository();
    }

    public function myClients($userId)
    {
        return $this->repository->myClients($userId);
    }

}
