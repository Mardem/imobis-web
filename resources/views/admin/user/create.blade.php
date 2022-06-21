@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Criar novo usuário</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></div>
                <div class="breadcrumb-item">Novo usuário</div>
            </div>
        </div>
        <div class="section-body">
            @component('admin.components.message')@endcomponent

            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('users.store') }}" method="post" id="form">
                        @csrf

                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h4>Cadastro de novo usuário</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Nome do usuário<b class="text-danger">*</b></label>
                                            <input type="text" class="form-control" name="name" >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>E-mail<b class="text-danger">*</b></label>
                                            <input type="email" id="email" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Senha<b class="text-danger">*</b></label>
                                            <input type="password" id="password" name="password"  class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Confirmar senha<b class="text-danger">*</b></label>
                                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
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
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $("#form").validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: "required",
                confirm_password: {
                    equalTo: "#password"
                }
            },
            messages: {
                name: "Digite o nome do usuário",
                email: {
                    required: "Digite o e-mail do usuário",
                    email: "Digite um e-mail válido"
                },
                password: {
                    required: "Por favor, digite uma senha",
                },
                confirm_password: {
                    equalTo: "As senhas precisam ser iguais!",
                    required: "Por favor, digite uma senha",
                }
            }
        });

    </script>
@endpush
