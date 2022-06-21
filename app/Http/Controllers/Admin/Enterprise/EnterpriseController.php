<?php


namespace App\Http\Controllers\Admin\Enterprise;


use App\Http\Controllers\Controller;
use App\Repository\EnterpriseRepository;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EnterpriseRepository();
    }

    public function index()
    {
        return view('admin.enterprise.home', ['enterprises' => $this->repository->list()]);
    }

    public function create()
    {
        return view('admin.enterprise.create');
    }

    public function edit($id)
    {
        $enterprise = $this->repository->findById($id);
        return view('admin.enterprise.edit', compact('enterprise'));
    }

    public function update(Request $request, $id)
    {
        $status = $this->repository->update($request, $id);

        if($status) {
            session()->flash('success', 'A empresa foi atualizada com sucesso!');
        } else {
            session()->flash('error', 'Não foi possível atualizar a empresa!');
        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $status = $this->repository->store($request);

        if($status) {
            session()->flash('success', "A empresa " . $request->get("name") . " foi inserida com sucesso!");
        } else {
            session()->flash('error', "A empresa " . $request->get("name") . " não foi inserida!");
        }

        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        echo 'mataaaa';
    }
}
