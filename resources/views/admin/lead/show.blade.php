@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $lead->title }} • <span class="badge badge-success" style="font-size: 13px;padding: 7px 14px;">{{ $lead->stage_formatted }}</span></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('leads.index') }}">Leads</a></div>
                <div class="breadcrumb-item">Detalhes - {{ $lead->title }}</div>
            </div>
        </div>
        <div class="section-body">
            @component('admin.components.message')@endcomponent

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detalhes do Lead</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12  col-md-6 col-xs-12">
                                    <div class="section-title mt-0">Dados da lead</div>
                                    <p><b>Título completo:</b> {{ $lead->title }}</p>
                                    <p>
                                        <b>Etapa atual:</b>
                                        <span class="badge badge-success">{{ $lead->stage_formatted }}</span>
                                    </p>
                                    <p><b>Fechamento estimado:</b> {{ $lead->estimated_close_formatted }}</p>
                                    <p>
                                        <b>Responsável pelo atendimento:</b>
                                        <a href="javascript:">{{ $lead->responsible->name }}</a>
                                    </p>
                                    <p><b>Descrição completa</b></p>
                                    <blockquote>
                                        {{ $lead->description }}
                                    </blockquote>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xs-12">
                                    <div class="section-title mt-0">Dados do cliente</div>
                                    <p><b>Cliente:</b> <a
                                            href="{{ route('clients.edit', $lead->client->id) }}">{{ $lead->client->name }}</a>
                                    </p>
                                    <p><b>Telefone para contado: </b> {{ $lead->phone }}</p>
                                    <p><b>E-mail para contado: </b> {{ $lead->client->email }}</p>
                                </div>
                                <div class="col-sm-12 col-md-12 col-xs-12">
                                    <div class="section-title mt-0">Dados financeiros</div>
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4>
                                                <b>Orçamento inicial:</b>
                                                <span class="badge badge-success">R$ {{ $lead->budget_formatted }}</span>
                                            </h4>

                                            <div class="card-header-action">
                                                <a href="#" id="add-transaction" class="btn btn-primary">
                                                    Adicionar transação
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                    <th>Tipo</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($lead->expenses as $expense)
                                                    <tr>
                                                        <td scope="row">{{ $expense->description }}</td>
                                                        <td>R$ {{ $expense->value_formatted }}</td>
                                                        <td>{{ $expense->type_formatted }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="card-footer bg-whitesmoke">
                                            <span class="badge badge-success">Orçamento inicial: R$ {{ $lead->budget_formatted }}</span>
                                            <span class="badge badge-danger">Gastos totais: R$ {{ $lead->total_expenses_formatted }}</span>
                                            <span class="badge badge-info">Orçamento restante: R$ {{ $lead->sum_expenses }}</span>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/leads/lead-edit.js') }}"></script>

    <script>
        $('#add-transaction').on('click', function() {


            addTransaction('{{ route('add-expense') }}', {{ $lead->id }});
        })
    </script>

@endsection
