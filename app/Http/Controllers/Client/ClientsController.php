<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\Client\ClientRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientsController extends Controller
{

    protected $repository;

    public function __construct()
    {
        $this->repository = new ClientRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.client.home', ['data' => $this->repository->list()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $users = User::all();
        return view('admin.client.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $status = $this->repository->store($request);

        if($status) {
            session()->flash('success', "O usuário " . $request->get("name") . " foi inserido com sucesso!");
        } else {
            session()->flash('error', "O usuário " . $request->get("name") . " não foi inserido!");
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        return view('admin.client.edit', ['data' => $this->repository->findById($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $status = $this->repository->update($request, $id);

        if($status) {
            session()->flash('success', 'A empresa foi atualizada com sucesso!');
        } else {
            session()->flash('error', 'Não foi possível atualizar a empresa!');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function destroy($id)
    {
        $status = $this->repository->delete($id);

        if ($status) {
            session()->flash('success', "O usuário foi apagado com sucesso!");
        } else {
            session()->flash('error', "O usuário foi não apagado com sucesso!");
        }

        return redirect()->back();
    }
}
