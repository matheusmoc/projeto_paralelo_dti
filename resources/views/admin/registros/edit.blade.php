@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar ticket</h1>
@stop

@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjU"></script>
<title>Document</title>
</head>
<body class="container"> 
    <form method="post" action="{{route('registros.update', [$registros->id])}}"> 
      {{-- php artisan route:list  --}}
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="exampleFormControlInput1">Nome</label>
        <input name='nome' type="text" value="{{ $registros->nome ?? old('nome') }}" class= "form-control" id="exampleFormControlInput1" placeholder="Nome">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Sobrenome</label>
        <input name='sobrenome' type="text" value="{{ $registros->sobrenome ?? old('sobrenome') }}" class= "form-control" id="exampleFormControlInput1" placeholder="Sobrenome">
      </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Email</label>
      <input name='email' type="text" value="{{ $registros->email ?? old('email') }}" class= "form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Assunto</label>
      
      <select name='registro_assuntos_id' class="form-control" id="exampleFormControlSelect1">
        <option><-vazio-></option>
        @foreach ($registro_assuntos as $registro_assunto )
        <option value="{{$registro_assunto->id}}" {{ old('registro_assuntos_id', $registros->registro_assuntos_id) == $registro_assunto->id ? 'selected' : '' }}>{{$registro_assunto->registro_assunto}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Informar problema</label>
      <textarea name='descricao' type='text' class="form-control" id="exampleFormControlTextarea1" rows="3">{{$registros->descricao  ?? old('descricao')}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</body>
</html>

@stop