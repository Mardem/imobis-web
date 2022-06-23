<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Repository\LeadRepository;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new LeadRepository();
    }

    public function myLeads(Request $request)
    {
        return $this->repository->myLeads($request);
    }

    public function updateStage(Request $request)
    {
        $status = $this->repository->updateStage($request->get('id'), $request->get('stage'));

        if ($status) {
            return ['status' => true, 'message' => 'Etapa alterada com sucesso!'];
        } else {
            return ['status' => false, 'message' => 'Não foi possível alterar a etapa!'];
        }
    }

    public function find($id)
    {
        try {

            return [
                'status' => true,
                'data' => $this->repository->findById($id)
            ];

        } catch (\Exception $exception) {
            return ['status' => false, 'message' => 'Encontrar este lead!'];
        }
    }
}
