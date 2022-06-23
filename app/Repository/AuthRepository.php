<?php


namespace App\Repository;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }


    public function login($login, $password)
    {
        try {
            $status = Auth::attempt(['email' => $login, 'password' => $password]);

            if($status) {
                return [
                    'status' => true,
                    'message' => 'Usuário autenticado com sucesso!'
                ];
            } else {
                return [
                    'status' => false,
                    'message' => 'Não foi possível autenticar o usuário'
                ];
            }
        } catch (\Exception $exception) {
            return [
                'status' => false,
                'message' => 'Houve um problema na autenticação',
                'error' => $exception->getMessage()
            ];
        }
    }
}
