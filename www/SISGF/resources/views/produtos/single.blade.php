@extends('layout.header')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-package bg-blue"></i>
                            <div class="d-inline">
                                <h5>Produto</h5>
                                <span>Exibindo os dados do produto</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="/produtos">Produtos</a></li>
                                <li class="breadcrumb-item active"><a href="#">Exibindo produto</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" style="font-size: 1.2em">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nome: </label>
                                        <input class="form-control" style="width: 100%;color: black; opacity: 1;" type="text" value="{{ucfirst($produto['nome'])}}" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Categoria: </label>
                                        <input class="form-control" style="width: 100%;color: black; opacity: 1;" type="text" value="{{ucfirst($categoria)}}" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="font-size: 1.2em">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tipo: </label>
                                        <input class="form-control" style="width: 100%;color: black; opacity: 1;" type="text" value="{{ucfirst($produto['tipo_produto'])}}" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Codigo de barras: </label>
                                        <input class="form-control" style="width: 100%;color: black; opacity: 1;" type="number" value="{{$produto['codigo']}}" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="font-size: 1.2em">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Quantidade em estoque: </label>
                                        <input class="form-control" style="width: 100%;color: black; opacity: 1;" type="text" value="{{$produto['quantidade']}}" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Preço: </label>
                                        <input class="form-control" style="width: 100%;color: black; opacity: 1;" type="text" value="R$ {{$produto['preco']}}" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Drogaria: </label>
                                    <input class="form-control" style="width: 100%;color: black; opacity: 1;" type="text" value="{{$drogaria}}" disabled/>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 16px">
                                <div class="col-md-12">
                                    <label for="">Descrição: </label>
                                    <textarea class="form-control" style="width: 100%;color: black; opacity: 1;" name="descricao" cols="30" rows="6" disabled>{{$produto['descricao']}}</textarea>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 16px">
                                <div class="col-md-12">
                                    <a href="{{url("/")}}/produtos/edit/{{$produto['id']}}" class="btn btn-primary text-white">Editar <i class="ik ik-edit-2"></i></a>
                                    <button type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal-{{$produto['id']}}">Excluir <i class="ik ik-trash-2"></i></button>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal-{{$produto['id']}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLable" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLable">Tem certeza que deseja deletar?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <a href="{{url("/produtos/delete")}}/{{$produto['id']}}"><button type="button" class="btn btn-danger">Sim, deletar</button></a>
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
@endsection