<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Lead;
use App\Models\User;
use App\Repository\LeadRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LeadController extends Controller
{

    protected $repository;

    public function __construct()
    {
        $this->repository = new LeadRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $stage0 = Lead::where('stage', 0)->get();
        $stage1 = Lead::where('stage', 1)->get();
        $stage2 = Lead::where('stage', 2)->get();
        $stage3 = Lead::where('stage', 3)->get();

        return view('admin.lead.home', compact('stage0', 'stage1', 'stage2', 'stage3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $users = User::all();
        $clients = Client::all();
        return view('admin.lead.create', compact('users', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $status = $this->repository->store($request);

        if ($status) {
            session()->flash('success', "O lead " . $request->get("name") . " foi inserida com sucesso!");
        } else {
            session()->flash('error', "O lead " . $request->get("name") . " não foi inserida!");
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $lead = $this->repository->findById($id);
        return view('admin.lead.show', compact('lead'));
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

    public function addExpense(Request $request)
    {
        $status = $this->repository->addExpense($request);

        if ($status) {
            return ['status' => true, 'message' => 'Transação adicionada!'];
        } else {
            return ['status' => false, 'message' => 'Não foi possível adicionar transação!'];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
