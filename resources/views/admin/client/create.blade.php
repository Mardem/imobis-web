@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Criar novo cliente</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clientes</a></div>
                <div class="breadcrumb-item">Novo cliente</div>
            </div>
        </div>
        <div class="section-body">
            @component('admin.components.message')@endcomponent

            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('clients.store') }}" method="post">
                        @csrf

                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h4>Cadastro de novo cliente</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Nome do cliente<b class="text-danger">*</b></label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>E-mail<b class="text-danger">*</b></label>
                                            <input type="text" id="email" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="colab_id">Colaborador responsável<b class="text-danger">*</b></label>
                                            <select name="colab_id" id="colab_id" class="form-control">
                                                @foreach($users as $colab)
                                                    <option value="{{ $colab->id }}">{{ $colab->name }}</option>
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
