@extends('master')
@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h3><span class="audiowide">Editar escalão</span></h3>
                                </div>
                                <div class="col text-right">
                                    <a type="button" class="btn btn-primary cinza text-white" href="{{route('escalao')}}">
                                        <i class="icon-logout">
                                            Voltar
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row ">
                                <div class="container ">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong>Formulário</strong>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{route('escalao.atualizar',$id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                        {{ csrf_field() }}
                                                        @include('sistema.escalao.form.formulario')
                                                        <button class="btn btn-block text-white btn-lg cinza audiowide">Salvar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

@endsection