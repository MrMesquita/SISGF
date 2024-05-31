@extends('layout.header')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-user bg-blue"></i>
                            <div class="d-inline">
                                <h5>Cliente</h5>
                                <span>Exibindo os dados do cliente</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active"><a href="/clientes">Clientes</a></li>
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
                                <div class="col-md-4">
                                    <p><strong>Nome: </strong><input style="width: 100%; margin-top: 2px;" type="text" value="{{ucfirst($cliente['nome'])}}" disabled/></p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Email: </strong><input style="width: 100%; margin-top: 2px;" type="text" value="{{$cliente['email']}}" disabled/></p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Documento: </strong><input style="width: 100%; margin-top: 2px;" type="text" value="{{$cliente['documento']}}" disabled/></p>
                                </div>
                            </div>
                            <div class="row" style="font-size: 1.2em">
                                <div class="col-md-4">
                                    <p><strong>Rua: </strong><input style="width: 100%; margin-top: 2px;" type="text" value="{{$cliente['rua']}}" disabled/></p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Bairro: </strong><input style="width: 100%; margin-top: 2px;" type="text" value="{{$cliente['bairro']}}" disabled/></p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Cidade: </strong><input style="width: 100%; margin-top: 2px;" type="text" value="{{$cliente['cidade']}}" disabled/></p>
                                </div>
                            </div>
                            <div class="row" style="font-size: 1.2em">
                                <div class="col-md-4">
                                    <p><strong>Cep: </strong><input style="width: 100%; margin-top: 2px;" type="text" value="{{$cliente['cep']}}" disabled/></p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>País: </strong><input style="width: 100%; margin-top: 2px;" type="text" value="{{$cliente['pais']}}" disabled/></p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>Complemento: </strong><input style="width: 100%; margin-top: 2px;" type="text" value="{{$cliente['complemento']}}" disabled/></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{url("/")}}/clientes/edit/{{$cliente['id']}}" class="btn btn-primary text-white">Editar <i class="ik ik-edit-2"></i></a>
                                    <button type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal-{{$cliente['id']}}">Excluir <i class="ik ik-trash-2"></i></button>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteModal-{{$cliente['id']}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLable" aria-hidden="true">
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
                                            <a href="{{url("/clientes/delete")}}/{{$cliente['id']}}"><button type="button" class="btn btn-danger">Sim, deletar</button></a>
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