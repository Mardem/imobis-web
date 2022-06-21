@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Todos usuários ({{ $data->count() }})</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('enterprise.index') }}">Empresas</a></div>
                <div class="breadcrumb-item">Todas empresas</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <p>Veja todos os usuários registrados</p>
                            <a href="{{ route('users.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Novo usuário
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>

                                            <a href="{{ route('users.edit', $item->id) }}"
                                               class="btn btn-warning">
                                                Editar
                                            </a>
                                            <form action="{{ route('users.destroy', $item->id) }}"
                                                  id="form-{{ $item->id }}"
                                                  onsubmit="deleteItem('#form-{{ $item->id }}')" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">
                                                    Excluir
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteItem(id) {
            $(id).submit(() =>  {

                e.preventDefault();
                Swal.fire({
                    title: 'Você tem certeza?',
                    text: "Você não poderá reverter o dado deletado!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Sim, deletar!'
                }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Deletado!',
                                'Você deletou o cliente com sucesso!',
                                'success'
                            )
                        }
                    }
                )
            })
        }
    </script>
@endpush
