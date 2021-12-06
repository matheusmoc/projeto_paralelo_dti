@extends('adminlte::page')

@section('title', 'Tickets')

@section('content_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjU"></script>
@stop


@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalhes do Ticket</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Nome</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ $registros->nome }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Sobrenome</span>
                                    <span
                                        class="info-box-number text-center text-muted mb-0">{{ $registros->sobrenome }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Assunto</span>
                                    <span class="info-box-number text-center text-muted mb-0">
                                        {{ $registros->assunto ? $registros->assunto->registro_assunto : '' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="post">
                                <div class="user-block">
                                    <span class="username">
                                        <a href="#">{{ $registros->nome }}</a>
                                    </span>
                                    <span class="description">{{$registros->updated_at}}</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    {{ $registros->descricao }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary"><i class="fas fa-user"></i>Autor</h3>
                    <p class="text-muted"></p>
                    <div class="text-muted">
                        <p class="text-sm">Chamado aberto por:
                            <b class="d-block">{{$registros->usuario}}</b>
                            <?php
                             //dd($registros);
                            ?>
                        </p>
                    </div>

                    <h5 class="mt-5 text-muted">Email:</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i>
                             {{$registros->email}}</a>
                        </li>
                        <h5 class="mt-5 text-muted">IP:</h5>
                        <ul class="list-unstyled">
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-user"></i>
                                {{$ip}}
                            </a>
                        </li>
                        <h5 class="mt-5 text-muted">SO e Browser:</h5>
                        <ul class="list-unstyled">
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-user"></i>
                                {{$sistema_op}}<br>
                            </a>
                        </li>
                    </ul>
                    <div class="text-center mt-5 mb-3">
                        {{-- <a href="#" class="btn btn-sm btn-primary">Add files</a> --}}
                        <a href="#" class="btn btn-sm btn-warning">Reportar Usuário</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

@stop
