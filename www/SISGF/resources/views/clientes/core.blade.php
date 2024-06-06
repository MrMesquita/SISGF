@extends('layout.header')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
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
                            <li class="breadcrumb-item"><a href="/clientes">Clientes</a></li>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nome">Nome:</label>
                                        <input type="text" class="form-control" value="{{ $cliente->nome ?? old('nome')}}" name="nome" id="nome" placeholder="fulano">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" value="{{ $cliente->email ?? old('email')}}" name="email" id="email" placeholder="exemplo@email.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="documento">Documento:</label>
                                        <input type="number" class="form-control" value="{{ $cliente->documento ?? old('documento')}}" name="documento" id="documento" placeholder="123.456.789-00">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rua">Rua:</label>
                                        <input type="text" class="form-control" value="{{ $cliente->rua ?? old('rua')}}" name="rua" id="rua" placeholder="R. fulano">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bairro">Bairro:</label>
                                        <input type="text" class="form-control" value="{{ $cliente->bairro ?? old('bairro')}}" name="bairro" id="bairro" placeholder="bairro">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cidade">Cidade:</label>
                                        <input type="text" class="form-control" value="{{ $cliente->cidade ?? old('cidade')}}" name="cidade" id="rua" placeholder="cidade">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cep">Cep:</label>
                                        <input type="text" class="form-control" value="{{ $cliente->cep ?? old('cep')}}" name="cep" id="cep" placeholder="55000-000">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pais">País:</label>
                                        <input type="text" class="form-control" value="{{ $cliente->pais ?? old('pais')}}" name="pais" id="pais" placeholder="país">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="complemento">Complemento:</label>
                                        <input type="text" class="form-control" value="{{ $cliente->complemento ?? old('complemento')}}" name="complemento" id="complemento" placeholder="complemento">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" value="{{ $cliente->id ?? null }}" name="id" id="id">
                            <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                            <a href="{{url("/clientes")}}" class="btn btn-light">Cancelar</a>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
