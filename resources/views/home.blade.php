@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Administração</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Bem vindo a administração</h3>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card card-hero">
                                        <div class="card-header">
                                            <div class="card-icon">
                                                <i class="fas fa-users" style="color: white;opacity: .2"></i>
                                            </div>
                                            <h4>{{ $users }}</h4>
                                            <div class="card-description">Usuários registrados</div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="tickets-list">
                                                <a href="{{ route('users.create') }}" class="ticket-item">
                                                    <div class="ticket-title">
                                                        <h4>Que tal começar registrando novo usuários?</h4>
                                                    </div>
                                                    <div class="ticket-info">
                                                        <div>
                                                            Para registrar usuários basta você clicar no botão abaixo ou
                                                            ir pelo menu lateral a esquerda.

                                                            <br><br>
                                                            <small>Usuários são pessoas que tem acesso ao
                                                                sistema.</small>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="{{ route('users.create') }}" class="ticket-item ticket-more">
                                                    Registrar usuários <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card card-hero">
                                        <div class="card-header">
                                            <div class="card-icon">
                                                <i class="fas fa-users" style="color: white;opacity: .2"></i>
                                            </div>
                                            <h4>{{ $clients }}</h4>
                                            <div class="card-description">Clientes registrados</div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="tickets-list">
                                                <a href="{{ route('clients.create') }}" class="ticket-item">
                                                    <div class="ticket-title">
                                                        <h4>Que tal começar registrando novos clientes?</h4>
                                                    </div>
                                                    <div class="ticket-info">
                                                        <div>
                                                            Para registrar um cliente basta você clicar no botão abaixo
                                                            ou
                                                            ir pelo menu lateral a esquerda.

                                                            <br><br>
                                                            <small>Clientes são pessoas que vinculo a um lead do sistema
                                                                (atendimento).</small>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="{{ route('clients.create') }}" class="ticket-item ticket-more">
                                                    Registrar clientes <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card card-hero">
                                        <div class="card-header">
                                            <div class="card-icon">
                                                <i class="far fa-file-alt" style="color: white;opacity: .2"></i>
                                            </div>
                                            <h4>{{ $leads }}</h4>
                                            <div class="card-description">Leads registrados</div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="tickets-list">
                                                <a href="{{ route('leads.create') }}" class="ticket-item">
                                                    <div class="ticket-title">
                                                        <h4>Que tal começar registrando um novo lead (atendimento)?</h4>
                                                    </div>
                                                    <div class="ticket-info">
                                                        <div>
                                                            Os leads são utilizados para realizar o atendimento ao
                                                            cliente, use essas ferramentas e vincule um cliente ao seu
                                                            lead.

                                                            <br><br>
                                                            <small>
                                                                Para registrar um cliente basta você clicar no botão abaixo
                                                                ou
                                                                ir pelo menu lateral a esquerda.
                                                            </small>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="{{ route('leads.create') }}" class="ticket-item ticket-more">
                                                    Registrar lead <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </div>
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

