@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Etapa inicial</h4>
                        </div>
                        <div class="card-body">
                            <div id="accordion">
                                @foreach($stage0 as $stage)
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link text-center w-100" data-toggle="collapse"
                                                        data-target="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne" style="font-size: 18px">
                                                    {{ $stage->title }}
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="badge badge-primary" style="width: 100%;">
                                                    <span>Cliente</span>
                                                </div>
                                                <p class="text-center">
                                                    {{ $stage->client->name }}
                                                </p>
                                                <div class="badge badge-info" style="width: 100%;">
                                                    <span>Fechamento previsto</span>
                                                </div>
                                                <p class="text-center">
                                                    {{ $stage->estimated_close_formatted }}
                                                </p>
                                                <div class="badge badge-primary" style="width: 100%;">
                                                    <span class="text-bla">Orçamento inicial</span>
                                                </div>
                                                <p class="text-center">
                                                    R$ {{ $stage->budget_formatted }}
                                                </p>
                                                <hr>
                                                <p>
                                                    <b>Descrição:</b> {{ $stage->description_formatted }}
                                                </p>
                                            </div>

                                        </div>
                                        <div class="card-footer bg-whitesmoke">
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('leads.show', $stage->id) }}" class="btn btn-warning">
                                                    <i class="fa fa-eye"></i>
                                                    Visualizar
                                                </a>
                                                <button type="submit" class="btn btn-primary change-stage"
                                                        data-id="{{ $stage->id }}" onclick="changeStatus('', 1)"><i
                                                        class="fa fa-edit"></i>
                                                    Alterar etapa
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h4>Em trâmite</h4>
                        </div>
                        <div class="card-body">
                            @foreach($stage1 as $stage)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link text-center w-100" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne" style="font-size: 18px">
                                                {{ $stage->title }}
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="badge badge-primary" style="width: 100%;">
                                                <span>Cliente</span>
                                            </div>
                                            <p class="text-center">
                                                {{ $stage->client->name }}
                                            </p>
                                            <div class="badge badge-info" style="width: 100%;">
                                                <span>Fechamento previsto</span>
                                            </div>
                                            <p class="text-center">
                                                {{ $stage->estimated_close_formatted }}
                                            </p>
                                            <div class="badge badge-primary" style="width: 100%;">
                                                <span class="text-bla">Orçamento inicial</span>
                                            </div>
                                            <p class="text-center">
                                                R$ {{ $stage->budget_formatted }}
                                            </p>
                                            <hr>
                                            <p>
                                                <b>Descrição:</b> {{ $stage->description_formatted }}
                                            </p>
                                        </div>

                                    </div>
                                    <div class="card-footer bg-whitesmoke">
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('leads.show', $stage->id) }}" class="btn btn-warning">
                                                <i class="fa fa-eye"></i>
                                                Visualizar
                                            </a>
                                            <button type="submit" class="btn btn-primary change-stage"
                                                    data-id="{{ $stage->id }}" onclick="changeStatus('', 1)"><i
                                                    class="fa fa-edit"></i>
                                                Alterar etapa
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Negócio fechado</h4>
                        </div>
                        <div class="card-body">
                            @foreach($stage2 as $stage)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link text-center w-100" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne" style="font-size: 18px">
                                                {{ $stage->title }}
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="badge badge-primary" style="width: 100%;">
                                                <span>Cliente</span>
                                            </div>
                                            <p class="text-center">
                                                {{ $stage->client->name }}
                                            </p>
                                            <div class="badge badge-info" style="width: 100%;">
                                                <span>Fechamento previsto</span>
                                            </div>
                                            <p class="text-center">
                                                {{ $stage->estimated_close_formatted }}
                                            </p>
                                            <div class="badge badge-primary" style="width: 100%;">
                                                <span class="text-bla">Orçamento inicial</span>
                                            </div>
                                            <p class="text-center">
                                                R$ {{ $stage->budget_formatted }}
                                            </p>
                                            <hr>
                                            <p>
                                                <b>Descrição:</b> {{ $stage->description_formatted }}
                                            </p>
                                        </div>

                                    </div>
                                    <div class="card-footer bg-whitesmoke">
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('leads.show', $stage->id) }}" class="btn btn-warning">
                                                <i class="fa fa-eye"></i>
                                                Visualizar
                                            </a>
                                            <button type="submit" class="btn btn-primary change-stage"
                                                    data-id="{{ $stage->id }}" onclick="changeStatus('', 1)"><i
                                                    class="fa fa-edit"></i>
                                                Alterar etapa
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h4>Cancelados</h4>
                        </div>
                        <div class="card-body">
                            @foreach($stage3 as $stage)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link text-center w-100" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne" style="font-size: 18px">
                                                {{ $stage->title }}
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="badge badge-primary" style="width: 100%;">
                                                <span>Cliente</span>
                                            </div>
                                            <p class="text-center">
                                                {{ $stage->client->name }}
                                            </p>
                                            <div class="badge badge-info" style="width: 100%;">
                                                <span>Fechamento previsto</span>
                                            </div>
                                            <p class="text-center">
                                                {{ $stage->estimated_close_formatted }}
                                            </p>
                                            <div class="badge badge-primary" style="width: 100%;">
                                                <span class="text-bla">Orçamento inicial</span>
                                            </div>
                                            <p class="text-center">
                                                R$ {{ $stage->budget_formatted }}
                                            </p>
                                            <hr>
                                            <p>
                                                <b>Descrição:</b> {{ $stage->description_formatted }}
                                            </p>
                                        </div>

                                    </div>
                                    <div class="card-footer bg-whitesmoke">
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('leads.show', $stage->id) }}" class="btn btn-warning">
                                                <i class="fa fa-eye"></i>
                                                Visualizar
                                            </a>
                                            <button type="submit" class="btn btn-primary change-stage"
                                                    data-id="{{ $stage->id }}" onclick="changeStatus('', 1)"><i
                                                    class="fa fa-edit"></i>
                                                Alterar etapa
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/leads/lead.js') }}"></script>

    <script>

        $('.change-stage').on('click', async function () {
            let id = $(this).data('id');
            changeStatus('{{ route('update-stage') }}', id);
        });
    </script>
@endpush
