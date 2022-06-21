@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Criar nova empresa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('enterprise.index') }}">Empresas</a></div>
                <div class="breadcrumb-item">Todas empresas</div>
            </div>
        </div>
        <div class="section-body">
            @component('admin.components.message')@endcomponent

            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('enterprise.store') }}" method="post">
                        @csrf

                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h4>Cadastro de nova empresa</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nome da empresa<b class="text-danger">*</b></label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>CEP<b class="text-danger">*</b></label>
                                            <input type="text" id="zipcode" name="zipcode" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="section-title">Endereço</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Logradouro<b class="text-danger">*</b></label>
                                            <input type="text" id="address" name="address" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Bairro<b class="text-danger">*</b></label>
                                            <input type="text" id="neighborhood" name="neighborhood" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Cidade<b class="text-danger">*</b></label>
                                            <input type="text" id="city" name="city" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>UF<b class="text-danger">*</b></label>
                                            <input type="text" id="uf" name="uf" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Complemento</label>
                                            <input type="text" id="complement" name="complement" class="form-control">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js"
            integrity="sha512-hAJgR+pK6+s492clbGlnrRnt2J1CJK6kZ82FZy08tm6XG2Xl/ex9oVZLE6Krz+W+Iv4Gsr8U2mGMdh0ckRH61Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        let zipcode = $('#zipcode');

        zipcode.mask('00000-000');

        zipcode.on('keyup', function () {
            let insertedCode = $(this).val();

            if (insertedCode.length === 9) {
                getAddress(insertedCode)
            }

        })

        function getAddress(zipcode) {
            axios.get('https://viacep.com.br/ws/' + zipcode + '/json/').then((request) => {
                let result = request.data;

                $('#address').val(result.logradouro);
                $('#neighborhood').val(result.bairro);
                $('#city').val(result.localidade);
                $('#uf').val(result.uf);
            })
        }
    </script>

@endsection
