@extends('layout.header')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-clipboard bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{$title}}</h5>
                            <span>{{$subTitle}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="/atestados">Atestados</a></li>
                            <li class="breadcrumb-item active"><a href="#">Cadastro</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ $title }}</h3></div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form class="forms-sample" method="{{$method}}" action="{{$action}}">
                            @csrf
                            <div class="row" style="margin-bottom: 16px">
                                <div class="col-md-6">
                                    <label for="cliente_id">Cliente:</label>
                                    <select class="form-control" name="cliente_id" id="cliente_id" required>
                                        @if ($cliente_id == null)
                                            <option value="">------</option>
                                        @endif
                                        @foreach ($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{ucfirst($cliente->nome)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="farmaceutico_id">Farmacêutico:</label>
                                    <select class="form-control" name="farmaceutico_id" id="farmaceutico_id" required>
                                        @if ($farmaceutico_id == null)
                                            <option value="">------</option>
                                        @endif
                                        @foreach ($farmaceuticos as $farmaceutico)
                                            <option value="{{$farmaceutico->id}}">{{ucfirst($farmaceutico->nome)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dt_inicio">Data de início:</label>
                                        <input type="date" class="form-control" value="{{ $atestado->dt_inicio ?? old('dt_inicio')}}" name="dt_inicio" id="dt_inicio" placeholder="01/01/2024">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dt_fim">Data de término:</label>
                                        <input type="date" class="form-control" value="{{ $atestado->dt_fim ?? old('dt_fim')}}" name="dt_fim" id="dt_fim" placeholder="01/01/2024">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="diagnostico">Diagnóstico:</label>
                                        <input type="text" class="form-control" value="{{ $atestado->diagnostico ?? old('diagnostico')}}" name="diagnostico" id="diagnostico" placeholder="Confirmado diagnóstico de..">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descricao">Descrição:</label>
                                        <textarea class="form-control" name="descricao" id="rua" cols="30" rows="6" placeholder="O paciente deve ficar de repouso por.." required>{{ $atestado->descricao ?? old('descricao')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" value="{{ $atestado->id ?? null }}" name="id" id="id">
                            <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                            <a href="{{url("/atestados")}}" class="btn btn-light">Cancelar</a>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
