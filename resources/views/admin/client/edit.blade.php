@extends('layouts.app')
@section('title', 'Edição de cliente')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Editar cliente {{ $data->name }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clientes</a></div>
                <div class="breadcrumb-item">Edição de cliente - {{ $data->name }}</div>
            </div>
        </div>
        <div class="section-body">
            @component('admin.components.message')@endcomponent

            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Dados do cliente - {{ $data->name }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('clients.update', $data->id) }}" method="post">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nome<b class="text-danger">*</b></label>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ $data->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>E-mail<b class="text-danger">*</b></label>
                                            <input type="text" id="email" name="email"
                                                   value="{{ $data->email }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit">Editar</button>

                            </form>
                            <hr>

                            <div class="row">
                                <div class="col-sm-6">
                                    <h2 class="section-title">Outras infos.</h2>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Colaborador responsável</label>
                                                <p>{{ $data->colab->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="card-header justify-content-between align-content-center align-items-center">
                                        <h2 class="section-title">Detalhes do usuário</h2>
                                        <button type="button" id="add-detail" class="btn btn-primary">
                                            <i class="fa fa-plus"></i> Novo detalhe
                                        </button>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">


                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th width="25%">#</th>
                                                    <th width="50%">Detalhe</th>
                                                    <th width="25%">Ações</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data->details as $detail)
                                                    <tr>
                                                        <td scope="row" width="20%">{{ $detail->id }}</td>
                                                        <td width="50%">{{ $detail->name }}</td>
                                                        <td width="30%">
                                                            <button class="btn btn-info btn-block">Alterar</button>
                                                            <button class="btn btn-outline-danger btn-remove" data-id="{{ $detail->id }}">Remover</button>
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
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/client/client.js') }}"></script>

    <script>
        $('#add-detail').on('click', async function () {
            await addDetail('{{ route('client-detail.store') }}', {{ $data->id }});
        });
        $('.btn-remove').on('click', async function () {
            await remove('{{ route('client-detail.destroy', $data->id) }}', $(this).data('id'));
        });
    </script>

@endsection
