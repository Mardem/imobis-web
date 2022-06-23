<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new AuthRepository();
    }

    public function login(Request $request)
    {
        return $this->repository->login($request->get('login'), $request->get('password'));
    }
}
