@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Criar novo lead</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('leads.index') }}">Leads</a></div>
                <div class="breadcrumb-item">Novo lead</div>
            </div>
        </div>
        <div class="section-body">
            @component('admin.components.message')@endcomponent

            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('leads.store') }}" method="post" id="form">
                        @csrf

                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h4>Cadastro de novo lead</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Título<b class="text-danger">*</b></label>
                                            <input type="text" class="form-control" name="title" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Cliente<b class="text-danger">*</b></label>
                                            <select name="client_id" class="form-control">
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Telefone do cliente<b class="text-danger">*</b></label>
                                            <input type="text" id="phone" class="form-control" name="phone" required>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="section-title">Detalhes do lead</h2>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Data de fechamento <small>(estimado)</small><b class="text-danger">*</b></label>
                                            <input type="datetime-local" id="estimated_close" name="estimated_close" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <textarea name="description" height="50px" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Orçamento inicial<b class="text-danger">*</b></label>
                                            <input type="number" min="0" id="budget" name="budget" class="form-control money" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Responsável pelo atendimento<b class="text-danger">*</b></label>
                                            <select name="responsable_id" class="form-control">
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer justify-content-end">
                                <button class="btn btn-success" type="submit">Cadastrar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        $('#phone').mask('(00) 0 0000-0000');
    </script>

@endsection
