@extends('layout.header')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="page-header-title">
                            <i class="ik ik-briefcase bg-blue"></i>
                            <div class="d-inline">
                                <h5>Funcionário</h5>
                                <span>Exibindo os dados do funcionário</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active"><a href="/funcionarios">Listando Funcionários</a></li>
                                <li class="breadcrumb-item active"><a href="/funcionarios">Funcionário</a></li>
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
                                        <input class="form-control" style="width: 100%;color: black; opacity: 1;" type="text" value="{{ucfirst($funcionario['nome'])}}" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Documento: </label>
                                        <input class="form-control" style="width: 100%;color: black; opacity: 1;" type="text" value="{{ucfirst($funcionario['documento'])}}" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="font-size: 1.2em">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Codigo de funcionário: </label>
                                        <input class="form-control" style="width: 100%;color: black; opacity: 1;" type="number" value="{{$funcionario['codigo']}}" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Drogaria: </label>
                                    <input class="form-control" style="width: 100%;color: black; opacity: 1;" type="text" value="{{$drogaria}}" disabled/>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 16px">
                                <div class="col-md-12">
                                    <a href="{{url("/")}}/funcionarios/edit/{{$funcionario['id']}}" class="btn btn-primary text-white">Editar <i class="ik ik-edit-2"></i></a>
                                    <button type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal-{{$funcionario['id']}}">Excluir <i class="ik ik-trash-2"></i></button>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal-{{$funcionario['id']}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLable" aria-hidden="true">
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
                                            <a href="{{url("/funcionarios/delete")}}/{{$funcionario['id']}}"><button type="button" class="btn btn-danger">Sim, deletar</button></a>
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