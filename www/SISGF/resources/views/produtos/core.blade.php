@extends('layout.header')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="page-header-title">
                        <i class="ik ik-box bg-blue"></i>
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
                            <li class="breadcrumb-item"><a href="/produtos">Produtos</a></li>
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
                                        <input type="text" class="form-control" value="{{ $produto->nome ?? old('nome')}}" name="nome" id="nome" placeholder="ex: Shampoo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="categoria_id">Categoria:</label>
                                        <select class="form-control" name="categoria_id" id="categoria_id" required>
                                            @if ($categoria_id == null)
                                                <option value="">------</option>
                                            @endif
                                            @foreach ($categorias as $categoria)
                                                <option value="{{$categoria->id}}">{{ucfirst($categoria->nome)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="documento">Tipo:</label>
                                        <select class="form-control" name="tipo_produto" id="tipo_produto" required>
                                            <option value="produto">Produto</option>
                                            <option value="remedio">Remédio</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="codigo">Codigo de barras:</label>
                                        <input type="text" class="form-control" value="{{ $produto->codigo ?? old('codigo')}}" name="codigo" id="codigo" placeholder="000000000">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bairro">Quantidade em estoque:</label>
                                        <input type="number" class="form-control" value="{{ $produto->quantidade ?? old('quantidade')}}" min="0" name="quantidade" id="quantidade" placeholder="quantidade">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="preco">Preço:</label>
                                        <input type="number" class="form-control" value="{{ $produto->preco ?? old('preco')}}" step="0.01" min="0" name="preco" id="preco" placeholder="R$ 0,00">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Drogaria">Drogaria:</label>
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
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descricao">Descrição:</label>
                                        <textarea class="form-control" name="descricao" cols="30" rows="6">{{$produto->descricao ?? old('descricao')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" value="{{ $produto->id ?? null }}" name="id" id="id">
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
