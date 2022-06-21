@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Todas empresas ({{ $enterprises->count() }})</h1>
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
                            <p>Veja todas empresas registradas</p>
                            <a href="{{ route('enterprise.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Nova empresa
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">CEP</th>
                                    <th scope="col">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($enterprises as $enterprise)
                                    <tr>
                                        <th scope="row">{{ $enterprise->id }}</th>
                                        <td>{{ $enterprise->name }}</td>
                                        <td>{{ $enterprise->zipcode }}</td>
                                        <td>

                                            <a href="{{ route('enterprise.edit', $enterprise->id) }}"
                                               class="btn btn-warning">
                                                Editar
                                            </a>
                                            <form action="{{ route('enterprise.destroy', $enterprise->id) }}"
                                                  id="form-{{ $enterprise->id }}"
                                                  onsubmit="deleteItem('#form-{{ $enterprise->id }}')" method="post">
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
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    }
                )
            })
        }
    </script>
@endpush
