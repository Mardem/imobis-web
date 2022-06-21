<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\Client\ClientDetailRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClientDetailController extends Controller
{

    protected $repository;

    public function __construct()
    {
        $this->repository = new ClientDetailRepository();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $status = $this->repository->store($request);

        if ($status) {
            return ['status' => true, 'message' => 'Detalhe inserido com sucesso!'];
        } else {
            return ['status' => false, 'message' => 'Não foi possível inserir esse detalhe!'];
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        $status = $this->repository->delete($request->get('id'));
        $uuid = Str::uuid();

        if ($status) {
            return ['status' => true, 'message' => 'Detalhe removido com sucesso!'];
        } else {
            return ['status' => false, 'message' => 'Não foi possível remover esse detalhe!'];
        }
    }
}
