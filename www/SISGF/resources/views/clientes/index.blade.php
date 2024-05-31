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
                            <h5>Clientes</h5>
                            <span>Listando todos os clientes do sistema</span>
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
                @if (session('erros'))
                    <div class="alert alert-danger">
                        <span>{{session('erros')}}</span>
                    </div>
                @elseif(session('sucesso'))
                    <div class="alert bg-success alert-success text-white">
                        <span>{{session('sucesso')}}</span>
                    </div>
                @endif
                <div class="card"style="padding: 0 2%">
                    <div class="card-header">
                        <a href="{{url("/clientes/register")}}"><button type="button" class="btn btn-success">Novo +</button></a>
                    </div>
                    <div class="card-body" >
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Documento</th>
                                    <th>Cep</th>
                                    <th class="nosort" style="text-align: right">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->id}}</td>
                                    <td>{{$cliente->nome}}</td>
                                    <td>{{$cliente->email}}</td>
                                    <td>{{$cliente->documento}}</td>
                                    <td>{{$cliente->cep}}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="{{url("/clientes/$cliente->id")}}" class=" btn btn-icon btn-secondary text-white"><i class="ik ik-eye"></i></a>
                                            <a href="{{url("/clientes/edit/$cliente->id")}}" class="btn btn-icon btn-primary text-white"><i class="ik ik-edit-2"></i></a>
                                            <button type="button" class="btn btn-danger btn-icon text-white" data-toggle="modal" data-target="#deleteModal-{{$cliente->id}}"><i class="ik ik-trash-2"></i></button>
                                        </div>
                                    </td>
                                    
                                    <div class="modal fade" id="deleteModal-{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLable" aria-hidden="true">
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
                                                    <a href="{{url("/clientes/delete/$cliente->id")}}"><button type="button" class="btn btn-danger">Sim, deletar</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


