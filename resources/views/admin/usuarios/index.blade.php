@extends('adminlte::page')

@section('title', 'Usuarios')

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

@foreach($pessoas as $pessoa)
<div class="container mt-5">
        <div class="row">
            <div class="col-3 mb-3">
                <div class="card">
                    <img src="#" class="card-img-top">
                    <div class="card-body">
                            <h2 class="card-title">{{$pessoa->name}}</h2><br>
                            <p><small class="text-muted"></small></p>
                            <p class='card-text'>status</p>
                            <hr>
                            <button data-bs-target="#collapseInfo" data-bs-toggle='collapse'
                                class="btn btn-sm btn-secondary">Dados do usuário</button>
                            <div class="collapse" id="collapseInfo">
                                <div class='card card-body'>
                                    <p>description here</p>
                                </div>
                            </div>
                            <hr>
                        <a href="#" class="btn btn-sm btn-danger">Desativar usuário</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@stop