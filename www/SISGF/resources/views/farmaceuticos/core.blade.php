@extends('layout.header')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="page-header-title">
                        <i class="ik ik-heart bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{$title}}</h5>
                            <span>{{$subTitle}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="/farmaceuticos">Farmacêuticos</a></li>
                            <li class="breadcrumb-item active"><a href="#">{{$title}}</a></li>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nome">Nome:</label>
                                        <input type="text" class="form-control" value="{{ $farmaceutico->nome ?? old('nome')}}" name="nome" id="nome" placeholder="ex: Fulano">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="documento">Documento:</label>
                                        <input type="number" class="form-control" value="{{ $farmaceutico->documento ?? old('documento')}}" name="documento" min="0" id="documento" placeholder="ex: 000.000.000-00">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="codigo">Codigo de funcionário:</label>
                                            <input type="number" class="form-control" value="{{$farmaceutico->codigo ?? old('codigo')}}" name="codigo" id="codigo" placeholder="ex: 20240000">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="codigo">CRF:</label>
                                            <input type="number" class="form-control" value="{{$farmaceutico->CRF ?? old('CRF')}}" name="CRF" id="CRF" placeholder="ex: 20240000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="drogaria_id">Drogaria:</label>
                                    <select class="form-control" name="drogaria_id" id="drogaria_id" required>
                                        @if ($drogaria_id == null)
                                            <option value="">------</option>
                                        @endif
                                        @foreach ($drogarias as $drogaria)
                                            <option value="{{$drogaria->id}}">{{ucfirst($drogaria->nome)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" value="{{ $farmaceutico->id ?? null }}" name="id" id="id">
                                    <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                                    <a href="{{url("/farmaceuticos")}}" class="btn btn-light">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
