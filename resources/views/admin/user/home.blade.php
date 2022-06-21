@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    @component('admin.components.message')@endcomponent
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
                                            <div class="dropdown show">
                                                <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                                   id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false">
                                                    Ações
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item"
                                                       href="{{ route('users.edit', $item->id) }}">
                                                        <i class="fa fa-edit"></i> Editar
                                                    </a>
                                                    <form action="{{ route('users.destroy', $item->id) }}"
                                                          id="form-{{ $item->id }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button"
                                                                onclick="deleteItem('#form-{{ $item->id }}')"
                                                                id="button-{{ $item->id }}"
                                                                class="btn btn-danger btn-lg btn-sm"
                                                                style="width: 100%;border-radius: 0">
                                                           <i class="fa fa-trash"></i> Excluir
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script>
        function deleteItem(id) {
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
                    $(id).submit()
                }
            })
        }
    </script>
@endpush
